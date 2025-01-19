<?php

namespace App\Http\Controllers\Redactor\DB;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddToTableController extends Controller
{
    static function index($data_for_table, $type = Null){
        // dd($data_for_table);
        if($type == 1){
            $time_data = $data_for_table;
            unset($time_data["input_type"]);
            unset($time_data["page_name"]);
            unset($time_data["but"]);
            unset($time_data["_token"]);
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
            return 0;
        }
        elseif ($type == 2){
            $time_data = $data_for_table;
            unset($time_data["input_type"]);
            unset($time_data["page_name"]);
            unset($time_data["but"]);
            unset($time_data["_token"]);
            $id = DB::table($data_for_table["page_name"]."_documents")->orderBy("id","desc")->get();
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
    
            DB::table($data_for_table["page_name"])->insert(["type_supplement"=>2, "supplement"=>$id, "position"=>$pos]);
            DB::table($data_for_table["page_name"]."_documents")->insert($time_data);
            unset($time_data);
            return 0;
        }
        elseif($type == Null){
            $time_data = $data_for_table;
            unset($time_data["input_type"]);
            unset($time_data["page_name"]);
            unset($time_data["but"]);
            unset($time_data["_token"]);
            $id = DB::table($data_for_table["page_name"])->orderBy("id","desc")->get();
    
            if(count($id)== 0){
                $id = 1;
            }
            else{
                $id = $id[0]->id + 1;
            }

            DB::table($data_for_table["page_name"])->insert(["name" => $time_data["name"], "path" => $time_data["path"],"position" =>$id-1]);
            unset($time_data);
            return 0;
        }
        
    }
}
