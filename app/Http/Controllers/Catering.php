<?php

namespace App\Http\Controllers;

use App\Models\Subsections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Catering extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsections::where('sections_id', '=', 14)
            ->select('id','name')
            ->orderBy('sort')
            ->get();

        $cateringMeans = DB::table("catering_means")->get();
        $cateringHealths = DB::table("catering_healths")->get();

        return view('pages.catering', [
            'subsections' => $subsections,
            'cateringMeans' => $cateringMeans,
            'cateringHealths' => $cateringHealths
        ]);
    }
}
