<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateringController extends Controller
{
    public function index (Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 14)
            ->select('id','name')
            ->orderBy('sort')
            ->get();

        $cateringMeals = DB::table("catering_meals")->get();
        $cateringHealths = DB::table("catering_healths")->get();

        return view('catering', [
            'subsections' => $subsections,
            'cateringMeals' => $cateringMeals,
            'cateringHealths' => $cateringHealths
        ]);
    }
}
