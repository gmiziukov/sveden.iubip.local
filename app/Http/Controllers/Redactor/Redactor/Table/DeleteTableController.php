<?php

namespace App\Http\Controllers\Redactor\Redactor\Table;

use App\Http\Controllers\Redactor\Redactor\Table\Migration\SearchMigrationController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteTableController extends Controller
{
    function __constructor($data_for_table){
        
    }
    static public function index($request){
        // dd($request->input());
        SearchMigrationController::index($request->input(),2);

    }
}
