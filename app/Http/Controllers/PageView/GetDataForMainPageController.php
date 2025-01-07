<?php

namespace App\Http\Controllers\PageView;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetDataForMainPageController extends Controller
{
    public function get_data(){

        $data = DB::table("svedens")->orderBy("position","asc")->get();
    
        return $data;
   } 
}
