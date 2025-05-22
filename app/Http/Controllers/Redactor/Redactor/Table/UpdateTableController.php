<?php

namespace App\Http\Controllers\Redactor\Redactor\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UpdateTableController extends Controller
{
    function __constructor($data_for_table){
        
    }
    static public function index($request)
    {
        function aa($req)
        {
            // dd($req);
            
            $rearr = [];
            $rearr1 = [];
            
            for($j = 0; $j!=count($req[array_keys($req)[0]]);$j++)
            {
                
                for($i = 0; $i!= count(array_keys($req));$i++)
                {
                    $rearr1[key($req)] = $req[key($req)][$j];
                    next($req);
                }
                
                array_push($rearr, $rearr1 );
                reset($req); 
                
            }
                // dd($rearr);
            return $rearr;
            
        }
        
        function arr($req)
        {
            $new_araay = [];
            $next_item = [];
            for($i=1; $i!=count($req);$i++)
            {
                next($req);
                for($j=0;$j!=count($req[key($req)]);$j++)
                { 
                    $next_item[$req['id'][$j]] = [key($req) => $req[key($req)][$j]];
                    // array_push($next_item[$req['id'][$j]], $req[key($req)][$j] );

                }
                array_push($new_araay, $next_item );
            }   
            // dd($new_araay);

            foreach($new_araay as $value)
            {
                // dd($value);
                foreach($value as $key => $item)
                {
                    $a[$key] = $a[$key] ?? [];
                    $a[$key] = array_merge($a[$key], $item);
                }
            }
            // dd($a);
            return($a);
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
        foreach($req as $key => $item){
            if(!is_array($item)){
                unset($req[$key]);
            }
        }
        // unset($req["table_name"]);
        // unset($req["page_name"]);
        // unset($req["input_type"]);
        // unset($req["but"]);
        // unset($req["_token"]);
        // unset($req["main_id"]);
        // unset($req["table*"]);
        // dd($req);
        $result = array_filter($req, function($v, $k){
            return strpos($k, "table") === 0;
        }, ARRAY_FILTER_USE_BOTH);
        // unset($req[array_keys($result)[0]]);
        // dd($req[array_keys($req)[0]]);
        // dd($req, aa($req), arr($req));
        // $req = aa($req);
        $req = arr($req);
        foreach($req as $id => $row)
        {
            // dd($req);
            DB::table($table_name)->where("id",$id)->updateOrInsert(['id' => $id],$row);
        }
        // for ($i = 0; $i <count($req);$i++){
        //     DB::table($table_name)->where("id",$req[$i]["id"])->updateOrInsert($req[$i]);
        // }

        return back();
    }
}
