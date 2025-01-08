<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\RedactMigrationController;

class SearchMigrationController extends Controller
{
    function __constructor(array $data_for_table){

    }
    static public function index($data_for_table){

        chdir('../database/migrations/');
        $instr = $data_for_table["name_table"];
        $instr = explode("_",$instr);
        $instr[count($instr)-1] = $instr[count($instr)-1]."s";

        for($i = 3;$i<count(scandir(".")); $i++){

            $i_str=explode("_", scandir(".")[$i]);

            for($j = 3;$j<count($i_str); $j++){

                if($i_str[$j] == $instr[0]){

                    for($u = 1; $u!=count($instr); $u++){

                        if($i_str[$j+$u] == $instr[$u]){

                            RedactMigrationController::index($data_for_table,scandir(".")[$i]);

                        }
                        else{

                        }

                    }

                }


            }

        }
    }


}
