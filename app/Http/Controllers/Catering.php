<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Catering extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table("catering_means")->get();
        $datatwo = DB::table("catering_healths")->get();

        return view('pages.catering', ['data' => $data, 'datatwo' => $datatwo]);
    }
}
