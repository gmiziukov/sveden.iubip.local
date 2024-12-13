<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function add_table(){
        $tables = []; 
        // dd(count(DB::table("education_tables")->get()));
        for ($i = 1; $i < count(DB::table("education_tables")->get())+1;$i++){

                $data = DB::table(DB::table("education_tables")->where("id",'=',$i)->get()[0]->name)->get();
                // dd($data);
                $tables[$i] = $data;

        }
        // dd($data);
        // dd($tables);
        return $tables;
    }
    public function index (Request $request)
    {
        // $data_main_page = DB::table('education')->get();
        $data = DB::table('education')
            ->Join('education_tables', function (JoinClause $join) {
                $join->on('education.supplement', '=', 'education_tables.id')
                    ->where('education.type_supplement', '=', 2);
            })->select('education.*', 'education_tables.name','education_tables.teg');
        $data1 = DB::table('education')
            ->Join('education_texts', function (JoinClause $join) {
                $join->on('education.supplement', '=', 'education_texts.id')
                    ->where('education.type_supplement', '=', 1);
                    
            })->select('education.*', 'education_texts.text','education_texts.teg')->union($data)->get();
            // ->leftjoin('education_documents', function (JoinClause $join) {
            //     $join->on('education.supplement', '=', 'education_documents.id')
            //         ->where('education.type_supplement', '=', 3);
                    
            // })

            // $data->get();
        // dd($this->add_table());
        return view('education',['data'=>$data1,'data_table' => $this->add_table()]);
    }
}
