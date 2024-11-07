<?php

namespace App\Http\Controllers;

use App\Models\Subsections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacantController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsections::where('sections_id', '=', 12)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $vacancies = DB::table("vacancies")->get();

        return view('pages.vacant',[
            'subsections' => $subsections,
            'vacancies' => $vacancies
        ]);
    }
}
