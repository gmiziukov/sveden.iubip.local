<?php

namespace App\Http\Controllers\Redactor\Redactor\DocOrHref;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddDocOrHrefController extends Controller
{
    function __constructor($data_for_table){
        $time_data = $data_for_table;
        unset($time_data["input_type"]);
        unset($time_data["page_name"]);
        $id = DB::table($data_for_table["page_name"]."_texts")->orderBy("id","desc")->get();
        dd($id);
        $id = $id[0]->id + 1;
        $pos = DB::table($data_for_table["page_name"])->orderBy("id","desc")->get();
        $pos = $pos[0]->id;
        DB::table($data_for_table["page_name"])->insert(["type_supplement"=>3, "supplement"=>$id, "position"=>$pos]);
        DB::table($data_for_table["page_name"]."_documents")->insert($time_data);
        unset($time_data);
    }
}
