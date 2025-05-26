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
            // var_dump(DB::table(DB::table($this->page1."_tables")->where("id",'=',$i)->get()[0]->name)->get());
            $data = DB::table(DB::table($this->page1."_tables")->where("id",'=',$i)->get()[0]->name)->get();
            // dd($data);
            $tables[$i] = $data;
        }   


        foreach ($tables as &$table){
            for($i=0; $i<count($table)-1;$i++){
                // dd($table);
                $iterator = 0;
                foreach ($table[$i] as $key => $value) {
                    $iterator++;
                    if($iterator % 2 == 0){
                        $a = $key."_doc_id";
                        // dd($a);
                        if(isset($table[$i]->$a) and $table[$i]->$a != null){
                            // dd($table[$i]->$key);
                            $table[$i]->$key = [DB::table($this->page1."_documents")->where("id",$table[$i]->$a)->select("name","path","type_doc","teg")->get()];

                            // dd(DB::table(DB::table($this->page1."_tables")->where("id",$i)->get()[0]->name)->where("id",$table[$i]->id)->get()[0]->id);//ПОЛУЧЕНИЕ ЗАПИСИ КОНЕЧНОЙ ТАБЛИЦЫ

                            // dd(DB::table($this->page1."_documents")->where("id",$table[$i]->$a)->select("name","path","type_doc","teg")->get());
                            // dd($table[$i]->$a);
                        }
                        else{
                            continue;
                        }
                        // dd($key,$value);
                    }
                    else{
                        continue;
                    }
                }
            }
        }
        // dd($tables);
        return $tables;
    }
}
