<?php

namespace App\Http\Controllers\Redactor\View\OtherPage;

use Illuminate\Support\Str;
use Illuminate\Support\Doctrine\Inflector;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\View\OtherPage\GetTableOtherPageController;
use Illuminate\Support\Collection;

class GetDataOtherPageController extends Controller
{
    public $page1;
    
    public function index(Request $request, $page1){  
        $table = new GetTableOtherPageController;
        $this->page1 = $page1;
        // dd(Str::plural('child'));
        $data_json = DB::table('svedens')->where('path',$page1)->select('data_json')->get()[0];
        $data_json = json_decode($data_json->data_json, true);

        // dd(json_decode($data_json->data_json));

        $data123 = DB::table($page1);
        $data = DB::table($page1)
        ->Join($page1.'_tables', function (JoinClause $join) {
            $join->on($this->page1.'.supplement', '=', $this->page1.'_tables.id')
                ->where($this->page1.'.type_supplement', '=', 3);
        })->select($page1.'.*', $page1.'_tables.name',$page1.'_tables.teg');

        $data1 = DB::table($page1)
        ->Join($this->page1.'_documents', function (JoinClause $join) {
            $join->on($this->page1.'.supplement', '=', $this->page1.'_documents.id')
                ->where($this->page1.'.type_supplement', '=', 2);        
        })->select($page1.'.*', $page1.'_documents.name',$page1.'_documents.teg', $page1.'_documents.path');

        $data2 = DB::table($page1)
            ->Join($page1.'_texts', function (JoinClause $join) {
                $join->on($this->page1.'.supplement', '=', $this->page1.'_texts.id')
                    ->where($this->page1.'.type_supplement', '=', 1);
        })->select($page1.'.*', $page1.'_texts.text',$page1.'_texts.teg')->orderBy("position","asc");
        $colect = new Collection();
        $colect = $colect->merge($data->get());
        $colect = $colect->merge($data1->get());
        $colect = $colect->merge($data2->get());
        $colect = $colect->sortBy("position");
        // dd($colect->sortBy("position"));

        
        $table = $table->get_table($this->page1);
        // dd($data_json , $table);
        // dd(count($data_json));

        if(isset($data_json) and $data_json[0] != null){
            // dd("dd");
            for($i=0;$i!=count($table);$i++){
                if ($data_json[$i] == null){
                    
                }
                else{
                    for($j=0;$j != count($data_json[$i]);$j++){
                        unset( $data_json[$i][$j][0]);
                        // for($k=0;)
                        // dd(gettype($table));
                        // при сборке масива делать запрос по значению сразу же подставлять ====== $table join  where $table.name = [page]_documents.id
                        // dd($table);
                        // dd($data_json[$i]);
                        $table[$i+1][$j+1]->js = $data_json[$i][$j];
                        // dd($data_json[$i][$j],$table[$i+1][$j]);
                    }

                }
            }
            // $new_data_table = $table
        }
        // dd($data_json , $table);
        

        // dd($data->get());
        return view("redactor/page",['data'=>$colect,'data_table'=> $table,'page_name'=>$page1,'json_data'=>json_encode($data_json)]);
        
    }
}













