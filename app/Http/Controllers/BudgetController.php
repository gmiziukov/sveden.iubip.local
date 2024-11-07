<?php

namespace App\Http\Controllers;

use App\Models\Subsections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsections::where('sections_id', '=', 11)
        ->select('id','name')
        ->orderBy('sort')
        ->get();

        $budgetValue = DB::table("budget_valumes")->get();
        $budgetValueYear = DB::table("budget_valume_in_years")->get();
        $budgetPlan = DB::table("budget_plan_docs")->get();
        
        return view('pages.budget', [
            'subsections' => $subsections,
            'budgetValue' => $budgetValue,
            'budgetValueYear' => $budgetValueYear,
            'budgetPlan' => $budgetPlan
        ]);


    }
}
