<?php

namespace App\Http\Controllers\Redactor\View\OtherPage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetTableOtherPageController extends Controller
{
    public function get_table($page1){

        $this->page1 = $page1;
        
        $tables = []; 

        for ($i = 1; $i < count(DB::table($this->page1."_tables")->get())+1;$i++){
            // dd(DB::table($this->page1."_tables")->where("id",'=',$i)->get());
            $data = DB::table(DB::table($this->page1."_tables")->where("id",'=',$i)->get()[0]->name)->get();
            // dd($data);
            $tables[$i] = $data;
        }   
        // dd($tables);
        return $tables;
    }
}
