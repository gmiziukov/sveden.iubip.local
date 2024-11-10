<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateringController extends Controller
{
    public function index (Request $request)
    {
        return view('catering');
    }
}
