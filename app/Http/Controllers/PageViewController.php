<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\PageView\GetDataForOtherPageController;
use App\Http\Controllers\PageView\GetDataForMainPageController;

class PageViewController extends Controller
{
    function index(Request $request,$page=Null){
        if ($page){
            $data = new GetDataForOtherPageController;
            $data = $data->get_data($page);
            // dd($data);
            return view("page",['data'=>$data["data"],'data_table'=>$data["data_table"]]);
        }
        else{
            $data = new GetDataForMainPageController;
            $data = $data->get_data();
            return view('page',['data'=>$data]);

        }
    }
}
