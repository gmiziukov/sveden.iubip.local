<?php

namespace App\Http\Controllers\Redactor\Redactor\MainTable;


use App\Http\Controllers\Redactor\Redactor\MainTable\CallCreateAllMainMigrationController;
use App\Http\Controllers\Redactor\DB\AddToTableController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddTableController extends Controller
{
    function __constructor(){
        
    }
    static public function index($request){
        $request  = $request->input();
        $request["page_name"] = "svedens";
        AddToTableController::index($request);
        // DB:table("svedens")->insert(["name"=>$request["name"], "href"=>$request["path"]]);
        // dd($request);
        CallCreateAllMainMigrationController::index($request['path']);







        // $file = $request->file('href');
        // dd($file);
        // $file[0]->store("dos");
        
        // $req = $request->input();
        // dd($request->file());

        // Storage::disk('public')->put('example.jpg', $request->file());

    }
}
