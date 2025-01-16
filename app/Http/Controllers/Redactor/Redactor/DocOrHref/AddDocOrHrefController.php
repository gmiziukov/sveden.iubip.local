<?php

namespace App\Http\Controllers\Redactor\Redactor\DocOrHref;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\DB\AddToTableController;

class AddDocOrHrefController extends Controller
{
    function __constructor(){

    }
    static public function index($data_for_table){
        AddToTableController::index($data_for_table,2);
        return redirect()->route("redactor",['data'=>$data_for_table["page_name"]]);
    }
}
