<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Scream;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ScreamController extends Controller {
  public function __construct() {
      $this->middleware('auth')->only(['create', 'store']);
  }

    public function index() {
        return $this->list();
    }

    public function create() {
        return view('screams.create');
    }

    public function store(Request $request) {
        DB::table('screams')->insert([
            'user_id' => Auth::id(),
            'scream_text' => $request->body,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        return redirect('/');
    }

    public function add_favorite(Request $request) {
      if($request->flag == 1) {
        DB::table('favorites')->insert([
            'user_id' => Auth::id(),
            'scream_id' => $request->body,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
      }
      else {
        Favorite::where('user_id', Auth::id())->where('scream_id', $request->body)->delete();
      }

      return redirect('/');
    }

    private function list() {
        $screams = Scream::with(['user', 'favorites' => function($q){
            $q->where('user_id', '=', Auth::id());
        }])->orderByRaw('id desc')->get();

        return view('screams.index', compact('screams'));
    }
}
