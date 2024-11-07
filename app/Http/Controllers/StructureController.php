<?php

namespace App\Http\Controllers;

use App\Models\Subsections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StructureController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsections::where('sections_id', '=', 2)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        
        $structureBase = DB::table("structure_base_organizations")->get();
        $structureBranches = DB::table("structure_branches")->get();
        $structureOffices = DB::table("structure_representative_offices")->get();

        return view('pages.structure',[
            'subsections' => $subsections,
            'structureBase' => $structureBase,
            'structureBranches' => $structureBranches,
            'structureOffices' => $structureOffices
        ]);
    }
}