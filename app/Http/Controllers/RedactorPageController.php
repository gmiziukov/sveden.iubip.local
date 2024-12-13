<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class RedactorPageController extends Controller
{   

    public function add_table(){
        $tables = []; 
        // dd(count(DB::table("education_tables")->get()));
        for ($i = 1; $i < count(DB::table($this->page1."_tables")->get())+1;$i++){
                $data = DB::table(DB::table($this->page1."_tables")->where("id",'=',$i)->get()[0]->name)->get();
                // dd($data);
                $tables[$i] = $data;

        }   
        // dd($data);
        // dd($tables);
        return $tables;
    }

    public function update_to_data_base($d){
        dd($d);
        return 0;
    }

    public $page1;
    public function index($page ,$page1){  
        $this->page1 = $page1;
        // dd($page1);
        $data = DB::table($page1)
        ->Join($page1.'_tables', function (JoinClause $join) {
            $join->on($this->page1.'.supplement', '=', $this->page1.'_tables.id')
                ->where($this->page1.'.type_supplement', '=', 2);
        })->select($page1.'.*', $page1.'_tables.name',$page1.'_tables.teg');
        $data1 = DB::table($page1)
            ->Join($page1.'_texts', function (JoinClause $join) {
                $join->on($this->page1.'.supplement', '=', $this->page1.'_texts.id')
                    ->where($this->page1.'.type_supplement', '=', 1);
                    
        })->select($page1.'.*', $page1.'_texts.text',$page1.'_texts.teg')->union($data)->orderBy("position","asc")->get();
        // dd($this->add_table());

        return view("redactor/page",['data'=>$data1,'data_table' => $this->add_table()]);
    }
}
