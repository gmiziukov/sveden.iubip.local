<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;


// RedactMigratoinController


class RunMigrationController extends Controller
{
    function __constructor(array $data_for_table){


    }
    static public function index($data_for_table, $table_name){
        $migrate = Artisan::call('migrate --force');
        
        if ($migrate == 0){

            $time_data = $data_for_table;
            unset($time_data["input_type"]);
            unset($time_data["page_name"]);
            unset($time_data["table_name"]);
            unset($time_data["teg_table"]);
            unset($time_data["but"]);
            $id = DB::table($data_for_table["page_name"]."_tables")->orderBy("id","desc")->first();
            $pos = DB::table($data_for_table["page_name"])->orderBy("id","desc")->get();
            
            if($id == NULL){ 
                $id = 1;
            }
            else{
                $id = $id->id + 1;
            }
            
            if(count($pos)== 0){
                $pos = 0;
            }
            else{
                $pos = $pos[0]->id;
            }
            unset($time_data["but"]);
            // dd($data_for_table);
            $time_data = $time_data;
            
            DB::table($data_for_table["page_name"])->insert(["type_supplement"=>3, "supplement"=>$id, "position"=>$pos]);
            DB::table($data_for_table["page_name"]."_tables")->insert(["name"=>$table_name."s", "teg"=>$data_for_table["teg_table"] ]);
            DB::table($table_name."s")->insert([$time_data]);
            unset($time_data);
        }
        else{
            dd("error");
        }

        return back();
    }
}
