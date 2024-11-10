<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrantsController extends Controller
{
    public function index (Request $request)
    {
        return view('grants');
    }
}
