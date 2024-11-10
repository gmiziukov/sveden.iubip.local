<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index (Request $request)
    {
        return view('budget');
    }
}
