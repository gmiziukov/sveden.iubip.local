<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduStandartsController extends Controller
{
    public function index (Request $request)
    {
        return view('edu-standarts');
    }
}
