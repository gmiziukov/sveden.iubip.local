<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\RedactMigrationController;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\DeleteMigrationController;


// -> CreateMigrationController


class SearchMigrationController extends Controller
{
    function __constructor(array $data_for_table){

    }
    static public function index($data_for_table, $status){
        // dd($status);
        chdir('../database/migrations/');
        $instr = $data_for_table["table_name"];
        $instr = explode("_",$instr);
        // dd(Str::plural('child'));
        // Str::plural('child')
        $instr[count($instr)-1] = Str::plural($instr[count($instr)-1]);
        // dd($instr);
        for($i = 3;$i<count(scandir(".")); $i++){

            $i_str=explode("_", scandir(".")[$i]);

            for($j = 3;$j<count($i_str); $j++){

                if($i_str[$j] == $instr[0]){

                    for($u = 1; $u!=count($instr); $u++){

                        if($i_str[$j+$u] == $instr[$u]){

                            if($status == 1){
                                RedactMigrationController::index($data_for_table,scandir(".")[$i]);
                                break;

                            }
                            elseif($status == 2){
                                DeleteMigrationController::index($data_for_table,scandir(".")[$i]);
                                break;
                            }


                        }
                        else{

                        }

                    }

                }


            }

        }
    }


}
