<?php

namespace App\Http\Controllers\Redactor\Redactor\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\CreateMigrationController;

class AddTableController extends Controller
{
    function __constructor($data_for_table){
        
    }
    static public function index($data_for_table){
        CreateMigrationController::index($data_for_table);
    }
 
}
