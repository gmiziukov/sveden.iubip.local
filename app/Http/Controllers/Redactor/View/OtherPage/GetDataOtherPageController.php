<?php

namespace App\Http\Controllers\Redactor\View\OtherPage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\View\OtherPage\GetTableOtherPageController;

class GetDataOtherPageController extends Controller
{
    public $page1;
    
    public function index(Request $request, $page1){  
        $table = new GetTableOtherPageController;
        $this->page1 = $page1;

        $data = DB::table($page1)
        ->Join($page1.'_tables', function (JoinClause $join) {
            $join->on($this->page1.'.supplement', '=', $this->page1.'_tables.id')
                ->where($this->page1.'.type_supplement', '=', 3);
        })->select($page1.'.*', $page1.'_tables.name',$page1.'_tables.teg');

        $data1 = DB::table('employees')
        ->Join($this->page1, function (JoinClause $join) {
            $join->on($this->page1.'.supplement', '=', $this->page1.'_documents.id')
                ->where($this->page1.'.type_supplement', '=', 2);        
        })->select($this->page1.'.*', $this->page1.'_documents.name',$this->page1.'_documents.teg', $this->page1.'_documents.path')->union($data);

        $data2 = DB::table($page1)
            ->Join($page1.'_texts', function (JoinClause $join) {
                $join->on($this->page1.'.supplement', '=', $this->page1.'_texts.id')
                    ->where($this->page1.'.type_supplement', '=', 1);
        })->select($page1.'.*', $page1.'_texts.text',$page1.'_texts.teg')->union($data)->orderBy("position","asc")->get();

        return view("redactor/page",['data'=>$data2,'data_table'=>$table->get_table($this->page1)]);
    }
}
