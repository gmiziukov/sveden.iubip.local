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
    static public function index($data_for_table, $file=null){

        // dd($file->getClientOriginalExtension());
        $file_name = $file->storeAs('images', time().Str::random(10).".".$file->getClientOriginalExtension(), 'public');

        AddToTableController::index($data_for_table,2,$file,$file_name);
        return redirect()->route("redactor",['data'=>$data_for_table["page_name"]]);
    }
}
