<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class ScreamController extends Controller {
    public function index() {
        return $this->list();
    }

    public function create() {
        return view('screams.create');
    }

    public function store(Request $request) {
        DB::table('screams')->insert([
          'user_id' => 1,
          'scream_text' => $request->body,
          'created_at' => new DateTime(),
          'updated_at' => new DateTime()
        ]);

        return $this->list();
    }

    private function list() {
        $screams = DB::table('screams')->orderByRaw('id desc')->get();
        $title = 'scream一覧';

        return view('screams.index', compact('screams'));
    }

    public function __construct() {
        $this->middleware('auth')->only(['create', 'store']);
    }
}
