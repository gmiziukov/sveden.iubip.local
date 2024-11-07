<?php

namespace App\Http\Controllers;

use App\Models\Subsections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternationalDogovorController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsections::where('sections_id', '=', 13)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $inter = DB::table("international_dogovors")->get();

        return view('pages.international-dogovors',[
            'subsections' => $subsections,
            'inter' => $inter
        ]);
    }
}
