<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// прикрутить удаление моделей 


class DeleteMigrationController extends Controller
{
    static public function index($data,$path){
        // dd($data['table_name']);
        // $model = chdir('../Models/'.$data["table_name"]);
        $id = DB::table($data["page_name"].'_tables')->where('name',$data["table_name"])->get();
        $main_id = DB::table($data["page_name"])->where('supplement',$id[0]->id)->where('type_supplement',3)->get();
        DB::table($data["page_name"].'_tables')->where('name',$data["table_name"])->delete();
        DB::table($data["page_name"])->where('supplement',$id[0]->id)->where('type_supplement',3)->delete();
        Schema::drop($data["table_name"]);
        DB::table($data["page_name"])->where("id",">",$main_id[0]->id)->orderBy('position', 'asc')->decrement('position',1);
        DB::table($data["page_name"])->where("id",">",$main_id[0]->id)->orderBy('id', 'asc')->decrement('id',1);
        DB::table($data["page_name"])->where("supplement",">",$id[0]->id)->where('type_supplement',3)->orderBy('supplement', 'asc')->decrement('supplement',1);
        DB::table($data["page_name"].'_tables')->where("id",">",$id[0]->id)->orderBy('id', 'asc')->decrement('id',1);
        unlink($path);

        return back();
    }
}
