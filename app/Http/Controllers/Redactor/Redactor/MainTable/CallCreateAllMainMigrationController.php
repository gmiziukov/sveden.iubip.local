<?php

namespace App\Http\Controllers\Redactor\Redactor\MainTable;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CallCreateAllMainMigrationController extends Controller
{
    public static function index($name){
        Artisan::call("app:remig ".$name." ".$name. " main");
        Artisan::call("app:remig ".$name."_tables ".$name." tables");
        Artisan::call("app:remig ".$name."_texts ".$name." texts");
        Artisan::call("app:remig ".$name."_documents ".$name." docs");
        return 0;
    }
}
