<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacantController extends Controller
{
    public function index (Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 12)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $vacancies = DB::table("vacancies")->get();

        return view('vacant',[
            'subsections' => $subsections,
            'vacancies' => $vacancies
        ]);
    }
}
