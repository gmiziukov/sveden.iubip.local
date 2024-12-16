<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use  App\Http\Controllers;

class RedactorController extends Controller
{

    public function __construct($var = null) {
        $this->var = $var;
    }
    public function index(){
        // ToolController::index();

        $data = DB::table("svedens")->orderBy("position","asc")->get();
        // вызов артизан команд 
        // Artisan::call('make:view dd');
        // dd($data);
        return view("redactor/redactor",['data'=>$data]);
    }

    public function NextPage($data1){
        $data = DB::table("svedens")->orderBy("position","asc")->get();
        return view("redactor/redactor/{data}",['data'=>$data]);
    }
    public function RedirectToPage($data,$data2){

        // dd($request);
        // dd($data2);
        // return $this->index($data=$page);
        return route("page",['data' => $data2]);
    }
    // #################################### придумать что делать с позицией на случай удаления ####################################
    public function ddb(Request $request){
        $req = $request->input();
        // dd($req);
        // array_unshift($req);
        ToolController::create_migration($req);
        // unset($req['table_name']);




        // DB::table('svedens')->insert($req);
        // $pos = DB::table('svedens')->orderBy("id",'desc')->select("id")->first();
        // DB::table('svedens')
        // ->where('id', $pos->id)
        // ->update(['position' => $pos->id-1]);
        // return route("redactor");
    }
}
