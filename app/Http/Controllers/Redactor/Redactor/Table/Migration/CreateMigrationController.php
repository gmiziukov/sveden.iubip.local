<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\SearchMigrationController;

class CreateMigrationController extends Controller
{
    public function __constructor(array $data_for_table){

    }
    static public function index($data_for_table){
        $migrate = Artisan::call('make:model '.$data_for_table["name_table"]." -m");
        $time_data = $data_for_table;

        if ($migrate == 0){
            return SearchMigrationController::index($data_for_table);
        }
        else{
            return dd("error");
        }
    }

}
