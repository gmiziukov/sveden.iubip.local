<?php

namespace App\Http\Controllers\Redactor\Redactor\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAndUpdateTableController extends Controller
{
    function __constructor($data_for_table){

        $migrate = Artisan::call('make:model '.$data_for_table["name_table"]." -m");
        $time_data = $data_for_table;

        if ($migrate == 0){
            ToolController::search_migration($data_for_table);
        }

    }
}
