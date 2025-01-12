<?php

namespace App\Http\Controllers\Redactor\Redactor\MainTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddTableController extends Controller
{
    function __constructor(){
        
    }
    static public function index($request){
        // $request->validate([
        //     'file_upload' => 'required|mimes:pdf,jpg,png|max:2048',
        // ]);
        $request = $request->input();
        $a = $request->file($request->href)->store("local");
        dd($a);
    
        // dd(public_path());
        // $file = $request->file($request["href"]);
        // $file = file($file);
        // $file->store("")
        Storage::disk('public')->put('example.jpg', file($request->href));
        // $request->file($file)->store("doc");
        // Storage::putFile("doc",$request->file($request["href"]));
    }
}
