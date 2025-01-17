<?php

namespace App\Http\Controllers\Redactor\View\MainPage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetDataMainPageController extends Controller
{
    public function index(Request $request){

        $data = DB::table("svedens")->orderBy("position","asc")->get();
        $name_page = $request->path();
        // dd($data);
        return view("redactor/redactor",['data'=>$data,'name_page'=>$name_page]);
    }
}
