<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EduStandartsController extends Controller
{
    public function index (Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 5)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $eduStandartFile = DB::table("edu_standart_files")->get();

        return view('edu-standarts',[
            'subsections' => $subsections,
            'eduStandartFile' => $eduStandartFile,
        ]);
    }
}
