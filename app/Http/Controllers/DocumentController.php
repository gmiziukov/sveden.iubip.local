<?php

namespace App\Http\Controllers;

use App\Models\Subsections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsections::where('sections_id', '=', 3)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $document = DB::table("documents")->get();

        return view('pages.document',[
            'subsections' => $subsections,
            'document' => $document
        ]);
    }
}
