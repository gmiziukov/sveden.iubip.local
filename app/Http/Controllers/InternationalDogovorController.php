<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternationalDogovorController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.international-dogovors');
    }
}
