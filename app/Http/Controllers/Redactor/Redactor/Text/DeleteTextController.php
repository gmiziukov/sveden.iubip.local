<?php

namespace App\Http\Controllers\Redactor\Redactor\Text;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteTextController extends Controller
{
    function __constructor(){
        
    }
    static public function index($request){
        $request = $request->input();
        $a = DB::table($request["page_name"])->where("id",">",$request["id"])->get();
        $b = DB::table($request["page_name"])->where("id",$request["id"])->get();
        DB::table($request["page_name"].'_texts')->where("id",$b[0]->supplement)->delete();
        DB::table($request["page_name"])->where("id",$request["id"])->delete();
        DB::table($request["page_name"])->where("id",">",$request["id"])->decrement("position",1);
        DB::table($request["page_name"])->where("id",">",$request["id"])->orderBy('id', 'asc')->decrement('id',1);

    }
}
