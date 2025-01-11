<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\SearchMigrationController;

// ->AddTableController

class CreateMigrationController extends Controller
{
    public function __constructor(array $data_for_table){

    }
    static public function index($data_for_table){
        
        $migrate = Artisan::call('make:migration '.Str::plural($data_for_table["table_name"]));
        // dd($data_for_table);

        if ($migrate == 0){
            return SearchMigrationController::index($data_for_table, 1);
        }
        else{
            return dd("error");
        }
    }

}
