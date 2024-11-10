<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaidEduController extends Controller
{
    public function index (Request $request)
    {
        return view('paid-edu');
    }
}
