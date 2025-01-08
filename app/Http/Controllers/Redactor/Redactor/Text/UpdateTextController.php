<?php

namespace App\Http\Controllers\Redactor\Redactor\Text;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateTextController extends Controller
{
    function __constructor(){
        
    }
    static public function index(Request $request){
        $request =$request->input();
        // dd($request);
        $a = DB::table($request["page_name"]."_texts")->where("id",$request["id"])->update(['text'=>$request['text'],'teg'=>$request['teg']]);
        // dd($a);
        return back();
    }
}
