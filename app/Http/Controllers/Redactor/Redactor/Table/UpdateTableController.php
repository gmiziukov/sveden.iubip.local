<?php

namespace App\Http\Controllers\Redactor\Redactor\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UpdateTableController extends Controller
{
    function __constructor($data_for_table){
        
    }
    static public function index($request){
        function aa($req){
            // dd($req);
            
            $rearr = [];
            $rearr1 = [];
            
            for($j = 0; $j!=count($req[array_keys($req)[0]]);$j++){
                
                for($i = 0; $i!= count(array_keys($req));$i++){
                    $rearr1[key($req)] = $req[key($req)][$j];
                    next($req);
                }
                
                array_push($rearr, $rearr1 );
                reset($req); 
                
            }
            
            return $rearr;
            
        }
        
        $req = $request->input();
        // dd();
        $table_name = $req["table_name"];
        // dd($req);
        if(array_key_exists("hidden",$req)){
            // dd($req["hidden"]);
            DB::table($req["page_name"])
            ->where("id",$req["main_id"])
            ->update(['hidden' => $req["hidden"]]);
            unset($req["hidden"]);
        }
        else{
            DB::table($req["page_name"])
            ->where("id",$req["main_id"])
            ->update(['hidden' => 0]);
        }
        unset($req["table_name"]);
        unset($req["page_name"]);
        unset($req["input_type"]);
        unset($req["but"]);
        unset($req["_token"]);
        unset($req["main_id"]);
        unset($req["table*"]);
        $result = array_filter($req, function($v, $k){
            return strpos($k, "table") === 0;
        }, ARRAY_FILTER_USE_BOTH);
        unset($req[array_keys($result)[0]]);
        $req = aa($req);
        // dd($req);

        for ($i = 1; $i<count($req)+1;$i++){
            DB::table($table_name)->where("id",$i)->updateOrInsert($req[$i-1]);
        }

        return back();
    }
}
