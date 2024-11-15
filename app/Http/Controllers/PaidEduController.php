<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaidEduController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 10)
            ->select('id', 'name')
            ->orderBy('sort')
            ->get();

        $paidEduFile = DB::table("paid_edu_files")->get();

        return view('paid-edu', [
            'subsections' => $subsections,
            'paidEduFile' => $paidEduFile
        ]);
    }
}
