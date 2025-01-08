<?php

namespace App\Http\Controllers\Redactor\View\MainPage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetDataMainPageController extends Controller
{
    public function index(){

        $data = DB::table("svedens")->orderBy("position","asc")->get();

        return view("redactor/redactor",['data'=>$data]);
    }
}
