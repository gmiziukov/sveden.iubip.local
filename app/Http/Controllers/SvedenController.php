<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SvedenController extends Controller
{
    public function index(){
        $data = DB::table("svedens")->orderBy("position","asc")->get();
        return view("sveden",["data"=>$data]);
    }
}
