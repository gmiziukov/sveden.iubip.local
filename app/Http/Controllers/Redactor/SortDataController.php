<?php

namespace App\Http\Controllers\Redactor;

// other
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// text controllers
use App\Http\Controllers\Redactor\Redactor\Text\UpdateTextController;
use App\Http\Controllers\Redactor\Redactor\Text\AddTextController;
use App\Http\Controllers\Redactor\Redactor\Text\DeleteTextController;
// main table controller
use App\Http\Controllers\Redactor\Redactor\MainTable\AddTableController;

// doc or href controllers
use App\Http\Controllers\Redactor\Redactor\DocOrHref\AddDocOrHrefController;


// table controllers
use App\Http\Controllers\Redactor\Redactor\Table\Migration\CreateMigrationController;
use App\Http\Controllers\Redactor\Redactor\Table\UpdateTableController;
use App\Http\Controllers\Redactor\Redactor\Table\AddAndUpdateTableController;
use App\Http\Controllers\Redactor\Redactor\Table\DeleteTableController;
 


class SortDataController extends Controller
{
    public $new_data;
    function prov(Request $request){
        $this->new_data = $request->data;

       
        // $this->new_data = $this->aa($this->new_data);
        var_dump($this->new_data);
        $path = explode("/",$request->path);
        $path = $path[count($path)-1];
        var_dump($path);
        DB::table("svedens")->where('path', $path)->update(['data_json'=>$this->new_data]);
        
        return response()->json($this->new_data);
    }
    function aa($r){
        return $this->new_data[] = 'test';
    }
    function sort(Request $request){

        if ($request->input()["but"]==1){
            return $this->sort_update($request);
        }
        elseif($request->input()["but"]==2){
            return $this->sort_delete($request);
        }
        elseif($request->input()["but"]==3){
            // dd($request->file($request->href));
            return $this->sort_add($request);
        }
        else{
            return dd("error: SortDataController -> sort");
        }
    }

    function sort_add(Request $request){
        $data_for_table = $request->input();
        // dd($request->file('path'));

        if($data_for_table["input_type"] == "1"){
            return AddTextController::index($data_for_table);
            
        }
        elseif($data_for_table["input_type"] == "2"){
            if($data_for_table["page_name"]=="redactor"){

                return AddTableController::index($request);
            }
            else{
                return AddDocOrHrefController::index($data_for_table = $data_for_table, $file = $request->file('path'));
            }
            return 0;
        }
        elseif($data_for_table["input_type"] == "3"){
            // dd("dd");
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
        // dd($data_for_table);

        if($data_for_table["input_type"] == "1"){
            return DeleteTextController::index($request);
            
        }
        elseif($data_for_table["input_type"] == "2"){
            dd($this->new_data);
            return 0;

        }
        elseif($data_for_table["input_type"] == "3"){
            // dd("dd");
            return DeleteTableController::index($request);
        }
    }
}
