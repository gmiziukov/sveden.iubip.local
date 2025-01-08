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
        $id = DB::table($request["page_name"])->where("id",$request["id"])->get();
        $id = $id[0]->supplement;
        $a = DB::table($request["page_name"]."_texts")->where("id",$id)->update(['text'=>$request['text'],'teg'=>$request['teg']]);
        return back();
    }
}
