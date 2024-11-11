<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagersController extends Controller
{
    public function index(Request $request)
    {
        $subsections = Subsection::where('sections_id', '=', 6)
            ->select('id', 'name')
            ->orderBy('sort')
            ->get();

        $managerBase = DB::table("manager_base_organizations")->get();
        $managerBranches = DB::table("manager_branches")->get();
        $managerOffices = DB::table("manager_representative_offices")->get();
        $managerFiles = DB::table("manager_files")->get();

        return view('managers', [
            'subsections' => $subsections,
            'managerBase' => $managerBase,
            'managerBranches' => $managerBranches,
            'managerOffices' => $managerOffices,
            'managerFiles' => $managerFiles
        ]);
    }
}
