<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrantsController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 9)
            ->select('id', 'name')
            ->orderBy('sort')
            ->get();

        $grantFile = DB::table("grant_files")->get();
        $grantHostel = DB::table("grant_hostels")
            ->get();

        return view('grants', [
            'subsections' => $subsections,
            'grantFile' => $grantFile,
            'grantHostel' => $grantHostel
        ]);
    }
}
