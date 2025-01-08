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
        $table_name = $req["table_name"];
        unset($req["table_name"]);
        unset($req["page_name"]);
        unset($req["input_type"]);
        // dd($req);
        $req = aa($req);

        for ($i = 1; $i<count($req)+1;$i++){
            DB::table($table_name)->where("id",$i)->update($req[$i-1]);
        }

        return back();
    }
}
