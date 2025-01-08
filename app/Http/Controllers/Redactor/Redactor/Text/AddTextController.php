<?php

namespace App\Http\Controllers\Redactor\Redactor\Text;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AddTextController extends Controller
{
    function __constructor(){

    }
    static function index($data_for_table){
        $time_data = $data_for_table;
        unset($time_data["input_type"]);
        unset($time_data["page_name"]);
        unset($time_data["but"]);
        $id = DB::table($data_for_table["page_name"]."_texts")->orderBy("id","desc")->get();
        $pos = DB::table($data_for_table["page_name"])->orderBy("id","desc")->get();

        if(count($id)== 0){
            $id = 1;
        }
        else{
            $id = $id[0]->id + 1;
        }

        if(count($pos)== 0){
            $pos = 0;
        }
        else{
            $pos = $pos[0]->id;
        }

        DB::table($data_for_table["page_name"])->insert(["type_supplement"=>1, "supplement"=>$id, "position"=>$pos]);
        DB::table($data_for_table["page_name"]."_texts")->insert($time_data);
        unset($time_data);
        return back();
    }
    
}
