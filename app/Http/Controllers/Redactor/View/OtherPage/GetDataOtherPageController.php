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
        })->select($page1.'.*', $page1.'_documents.name',$page1.'_documents.teg', $page1.'_documents.path', $page1.'_documents.type_doc');

        $data2 = DB::table($page1)
            ->Join($page1.'_texts', function (JoinClause $join) {
                $join->on($this->page1.'.supplement', '=', $this->page1.'_texts.id')
                    ->where($this->page1.'.type_supplement', '=', 1);
        })->select($page1.'.*', $page1.'_texts.text',$page1.'_texts.teg')->orderBy("position","asc");
        // dd($data1);
        $colect = new Collection();
        $colect = $colect->merge($data->get());
        $colect = $colect->merge($data1->get());
        $colect = $colect->merge($data2->get());
        $colect = $colect->sortBy("position");

        // dd($colect->sortBy("position"));

        
        $table = $table->get_table($this->page1);
        // dd();
        // dd($data_json[1][0][0]);
        if($data_json){
            // dd($table);
            for ($i = 1; $i != count($table) + 1; $i++) {
                $table[$i]['js'] = $data_json[$i];
            }
        }
        // $table = $table->toArray();
        // dd($data_json ,$table);
        // if (isset($data_json) && !empty($data_json)) {
        //     foreach ($table as $table_index => &$table_data) { // Итерируем по таблицам
        //         if ($table_index === 0) continue; // Пропускаем нулевой индекс (если он есть)
        
        //         $data_json_table_index = $table_index - 1; // Индекс для $data_json
        
        //         if (isset($data_json[$data_json_table_index])) {
        //             foreach ($table_data as $row_index => &$row_data) { // Итерируем по строкам
        //                 if (isset($data_json[$data_json_table_index][$row_index])) {
        //                     foreach ($data_json[$data_json_table_index][$row_index] as $key => $type_info) {
        //                         if (isset($type_info['type'])) {
        //                             $row_data->js[$key] = [$key, $type_info['type']];
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }



        // dd($data_json)
        
        // if(isset($data_json) and $data_json[0] != null){
        //     // dd($table, $data_json );
        //     for($i=0;$i!=count($table);$i++){
        //         if ($data_json[$i] == null){
                    
        //         }
        //         else{
        //             for($j=0;$j != count($data_json[$i]);$j++){
        //                 for($o=1; $o != count($data_json[$i][$j]);$o++)
        //                 if ($data_json[$i][$j][$o] == null){
                    
        //                 }
        //                 else{
        //                     $table[$i+1][$j]->js = $data_json[$i][$j];

        //                 }
        //                 // dd($data_json[$i][$j][$o]);
        //                 // $a = $data_json[$i][$j][0];
        //                 // unset( $data_json[$i][$j][0]);
        //                 // for($k=0;)
        //                 // dd(gettype($table));
        //                 // при сборке масива делать запрос по значению сразу же подставлять ====== $table join  where $table.name = [page]_documents.id

        //                 // $table[$i+1]
        //                 // $table[$i+1][$j+1]->js = $data_json[$i][$j];
        //                 // dd($data_json[$i][$j],$table[$i+1][$j]);
        //             }

        //         }
        //     }
        //     // $new_data_table = $table
        // }
        // // dd($data_json , $table);
        

        // dd($data->get());
        // dd($data_json);
        return view("redactor/page",['data'=>$colect,'data_table'=> $table,'page_name'=>$page1,'json_data'=>json_encode($data_json)]);
        
    }
}













