<?php

namespace App\Http\Controllers\Redactor\Redactor\DocOrHref;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Redactor\DB\AddToTableController;

class AddDocOrHrefController extends Controller
{
    function __constructor(){

    }
    
    // index()
    // 
    // 
    // 
    // 
    // 
    static public function index($data_for_table, $file=null){

        // dd($file->getClientOriginalExtension());
        if(file_exists($file)){
            $file_name = $file->storeAs('images', time().Str::random(10).".".$file->getClientOriginalExtension(), 'public');
        }
        else{
            $file_name = Null;
        }

        AddToTableController::index($data_for_table,2,$file,$file_name);
        return redirect()->route("redactor",['data'=>$data_for_table["page_name"]]);
    }


    // save_for_table() фунция для созранение документов 
    // из конечных таблиц
    // принимает:
    // $page_name @string - название страницы для определения таблицы 
    // $file @string - сам сохраняемый документ
    // $nam_col @string - данные из конечной таблицы
    //      слово которое будет ссылкой на документ
    // возвращает id записи  которая размещается в спец колонке
    //      в дочерней таблице
    // 
    static public function save_for_table($page_name, $file, $name_col){
        
        // dd($file->getClientOriginalExtension());
        $file_name = $file->storeAs('images', time().Str::random(10).".".$file->getClientOriginalExtension(), 'public');
        $data_for_table["page_name"] = $page_name;
        $data_for_table["path"] = null;
        $data_for_table["name"] = $name_col;

        AddToTableController::index($data_for_table,2,$file,$file_name);
        
        return  DB::table($page_name."_documents")->select("id")->orderBy("id","desc")->first()->id;
    }
}
