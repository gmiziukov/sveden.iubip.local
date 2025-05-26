<?php

namespace App\Http\Controllers\Redactor\Redactor\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\DocOrHref\AddDocOrHrefController;

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
        
        // arr принемает масив данных таблицы 
        // собирается масив:
        // id=> [
        // данные таблиц по строкам в асоциативном масиве
        // name=>"имя"
        // ...
        //]
        // id=>[...]
        // ...
        // что бы в дальнейшем можно было построково обновлять 
        // arr return @array


        function arr($req)
        {
            $new_araay = [];
            $next_item = [];
            for($i=1; $i!=count($req);$i++)
            {
                next($req);
                for($j=0;$j!=count($req[key($req)]);$j++)
                { 
                    if($req['id'][$j] == ""){
                        $req['id'][$j] = strval($j+1);
                        // $next_item[$req['id'][$j]]=  strval($j+1);
                        // dd($req);
                        $next_item[$req['id'][$j]] = [key($req) => $req[key($req)][$j]];
                    }
                    else{
                        $next_item[$req['id'][$j]] = [key($req) => $req[key($req)][$j]];
                    }
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


        // save_files_in_table() для сохраниения документов
        // 
        //  возвращает асоциативный масив для выгрузки в документы
        //  где:
        // id строка в конечной таблице 
        // $name @string
        // $path @string
        // ...
        // save_files_in_table return @array
        // (все данные в таблице с документами хранятся как строки)
        // AddDocOrHrefController::save_for_table()
        // возвращает id записи  которая размещается в спец колонке
        //      в дочерней таблице
        // save_for_table return @int
        function save_files_in_table($request,$page_name){            
            if(count($request->file())){
                // dd(($request->file()));
                foreach($request->file() as $name_col => $files){
                    if (count(explode("_",$name_col)) == 2){
                        // $output['id'][] = explode("_",$name_col)[1];
                        // $row_in_table = explode("_",$name_col)[1];
                        // $name_col_in_table = explode("_",$name_col)[0]."_doc_id";
                        // $name_col = explode("_",$name_col)[0];
                        // $output['id'][] = explode("_",$name_col)[1];

                        // $output[explode("_",$name_col)[0]."_doc_id"][] = AddDocOrHrefController::save_for_table($page_name = $page_name,$file = $files[0],$name_col = $name_col) ;
                        // dd(DB::table($request->input()["table_name"])->where("id",explode("_",$name_col)[1])->get()->explode("_",$name_col)[0]
                        // dd($oo);
                        $oo = explode("_",$name_col)[0];
                        $var = DB::table($request->input()["table_name"])->where("id",explode("_",$name_col)[1])->get()[0]->$oo;

                        $output[explode("_",$name_col)[1]][explode("_",$name_col)[0]."_doc_id"] = AddDocOrHrefController::save_for_table($page_name = $page_name,$file = $files[0],$name_col = $var) ;
                        // dd($name_col);
                    }
                    else{
                        continue;
                    }
    
                }
            }
            // dd($output);
            return $output;
        }

        $req = $request->input();
        // dd($req, $request->file());
        $table_name = $req["table_name"];
        $page_name = $req["page_name"];

        // dd($request->file());
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


        // уже сам не помню для чего это 
        // (strpos)скорее всего для 
        // для определения позиций
        // 
        // 
        // 
        $result = array_filter($req, function($v, $k){
            return strpos($k, "table") === 0;
        }, ARRAY_FILTER_USE_BOTH);



        // unset($req[array_keys($result)[0]]);
        // dd($req[array_keys($req)[0]]);
        // dd($req, aa($req), arr($req));
        // $req = aa($req);
        // dd(save_files_in_table($request,$page_name));



        // используем функцию arr 
        // для создания удобного масива
        // который можно будет просто 
        // использовать в запросах
        $req = arr($req);


        // 
        // 
        // 
        foreach($req as $id => $row)
        {
            // dd($req);
            DB::table($table_name)->where("id",$id)->updateOrInsert(['id' => $id],$row);
        }


        if(count($request->file())){
            $var = save_files_in_table($request,$page_name);
            // dd($var);
            foreach ($var as $key => $value){
                // dd($key,$value);
                DB::table($table_name)->where("id",$key)->updateOrInsert(['id' => $key],$value);
                // DB::table($table_name)->where("id",$key)->updateOrInsert(['id' => $key],$value);
            }
            
        }
        // for ($i = 0; $i <count($req);$i++){
        //     DB::table($table_name)->where("id",$req[$i]["id"])->updateOrInsert($req[$i]);
        // }

        return back();
    }
}
