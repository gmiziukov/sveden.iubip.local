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

        // dd($data->get());
        return view("redactor/page",['data'=>$colect,'data_table'=>$table->get_table($this->page1),'page_name'=>$page1]);
        
    }
}













