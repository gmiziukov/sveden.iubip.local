<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function index (Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 1)
            ->select('id','name')
            ->orderBy('sort')
            ->get();
        $commonInfoOrganiz = DB::table("common_info_organizations")->get();
        $commonFile = DB::table("common_files")->get();
        $commonInfoUchred = DB::table("common_info_uchreditels")->get();
        $commonPlacesEdu = DB::table("common_places_of_educationals")->get();
        $commonNetwork = DB::table("common_network_forms")->get();
        $commonPractic = DB::table("common_practices")->get();
        $commonPracticStudent = DB::table("common_practical_students")->get();
        $commonGia = DB::table("common_gias")->get();
        $commonDpos = DB::table("common_dpos")->get();
        $commonOppo = DB::table("common_oppos")->get();




        return view('common', [
            'subsections' => $subsections,
            'commonInfoOrganiz' => $commonInfoOrganiz,
            'commonFile' => $commonFile,
            'commonInfoUchred' => $commonInfoUchred,
            'commonPlacesEdu' => $commonPlacesEdu,
            'commonNetwork' => $commonNetwork,
            'commonPractic' => $commonPractic,
            'commonPracticStudent' => $commonPracticStudent,
            'commonGia' => $commonGia,
            'commonDpos' => $commonDpos,
            'commonOppo' => $commonOppo
        ]);
    }
}
