<?php

namespace App\Http\Controllers\Redactor;

use App\Http\Controllers\Redactor\Redactor\Table\Migration\CreateMigrationController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SortDataController extends Controller
{
    function sort(Request $request){
        $data_for_table = $request->input();
        if($data_for_table["input_type"] == "1"){
            return 0;
            
        }
        elseif($data_for_table["input_type"] == "2"){
            return 0;

        }
        elseif($data_for_table["input_type"] == "3"){
            return CreateMigrationController::index([$data_for_table][0]);

        }
    }
}
