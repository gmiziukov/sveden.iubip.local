<?php

namespace App\Http\Controllers\Redactor\Redactor\MainTable;


use App\Http\Controllers\Redactor\Redactor\MainTable\CallCreateAllMainMigrationController;
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
        DB:table("");
        // dd($request);
        // CallCreateAllMainMigrationController::index($request['href'][0]);







        // $file = $request->file('href');
        // dd($file);
        // $file[0]->store("dos");
        
        // $req = $request->input();
        // dd($request->file());

        // Storage::disk('public')->put('example.jpg', $request->file());

    }
}
