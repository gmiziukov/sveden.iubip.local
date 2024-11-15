<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterController extends Controller
{
    public function index (Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 13)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $inter = DB::table("international_dogovors")->get();

        return view('inter',[
            'subsections' => $subsections,
            'inter' => $inter
        ]);
    }
}
