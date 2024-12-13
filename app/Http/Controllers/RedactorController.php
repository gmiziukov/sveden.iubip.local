<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RedactorController extends Controller
{

    public function __construct($var = null) {
        $this->var = $var;
    }
    public function index(){
        $data = DB::table("svedens")->orderBy("position","asc")->get();

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
}
