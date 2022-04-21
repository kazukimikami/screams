<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreamController extends Controller
{
      public function index()
    {
        return view('scream');
    }
}
