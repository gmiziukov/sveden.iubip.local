<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index (Request $request)
    {
        return view('education');
    }
}
