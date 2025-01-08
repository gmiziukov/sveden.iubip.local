<?php

namespace App\Http\Controllers\Redactor;

// other
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// text controllers
use App\Http\Controllers\Redactor\Redactor\Text\UpdateTextController;
use App\Http\Controllers\Redactor\Redactor\Text\AddTextController;
use App\Http\Controllers\Redactor\Redactor\Text\DeleteTextController;

// doc or href controllers

// table controllers
use App\Http\Controllers\Redactor\Redactor\Table\Migration\CreateMigrationController;
use App\Http\Controllers\Redactor\Redactor\Table\UpdateTableController;
use App\Http\Controllers\Redactor\Redactor\Table\AddAndUpdateTableController;
use App\Http\Controllers\Redactor\Redactor\Table\DeleteTableController;



class SortDataController extends Controller
{
    function sort(Request $request){
        if ($request->input()["but"]==1){
            return $this->sort_update($request);
        }
        elseif($request->input()["but"]==2){
            return $this->sort_delete($request);
        }
        elseif($request->input()["but"]==3){
            return $this->sort_add($request);
        }
        else{
            return dd("error: SortDataController -> sort");
        }
    }

    function sort_add(Request $request){
        $data_for_table = $request->input();

        if($data_for_table["input_type"] == "1"){
            return AddTextController::index($data_for_table);
            
        }
        elseif($data_for_table["input_type"] == "2"){
            return 0;

        }
        elseif($data_for_table["input_type"] == "3"){
            return CreateMigrationController::index([$data_for_table][0]);

        }
    }

    function sort_update(Request $request){

        $data_for_table = $request->input();


        if($data_for_table["input_type"] == "1"){
            return UpdateTextController::index($request);
            
        }
        elseif($data_for_table["input_type"] == "2"){
            return 0;

        }
        elseif($data_for_table["input_type"] == "3"){
            return UpdateTableController::index($request);
        }
    }

    function sort_delete(Request $request){

        $data_for_table = $request->input();


        if($data_for_table["input_type"] == "1"){
            return DeleteTextController::index($request);
            
        }
        elseif($data_for_table["input_type"] == "2"){
            return 0;

        }
        elseif($data_for_table["input_type"] == "3"){
            return DaleteTableController::index($request);
        }
    }
}
