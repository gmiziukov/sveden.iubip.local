<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index (Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 3)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $document = DB::table("documents")->get();

        return view('document',[
            'subsections' => $subsections,
            'document' => $document
        ]);
    }
}
