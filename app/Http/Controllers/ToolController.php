<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ToolController extends Controller
{

    static function update_db(Request $request){
        function aa($req){
            // dd($req);
            $rearr = [];
            $rearr1 = [];
            // dd($req);
            // dd(count(array_keys($req)));
            // dd(count($req[array_keys($req)[0]])); 
            for($j = 0; $j!=count($req[array_keys($req)[0]]);$j++){
                for($i = 0; $i!= count(array_keys($req));$i++){
                    $rearr1[key($req)] = $req[key($req)][$j];
                    // dd($rearr1);
                    next($req);
                    // dd(key($req));
                }
                array_push($rearr, $rearr1 );
                // dd($rearr);
                reset($req); 
            }
            // dd($rearr);
            return $rearr;
        }
        $req = $request->input();
        // dd($req); 

        $table_name = $req["table_name"];
        unset($req["table_name"]);
        $req = aa($req);
        // dd($req);
        for ($i = 1; $i<count($req)+1;$i++){
            // dd(count($req));
            DB::table($table_name)->where("id",$i)->update($req[$i-1]);
        }
        // dd($req);
        // dd($request->input());
        return back();
    }
    static function create_migration($data_for_table){
        dd($data_for_table);
        $migrate = Artisan::call('make:model '.$data_for_table["table_name"]." -m");
        if ($migrate == 0){
            ToolController::search_migration($data_for_table);
        }
    } 
    static function run_migration($data_for_table, $table_name){
        $migrate = Artisan::call('migrate --force');
        if ($migrate == 0){
            DB::table($table_name."s")->insert([$data_for_table]);
        }
        else{
            dd("error");
        }
        return back();
    }


    // !!!!!!!!!!!!! не использовать с существующими миграциями !!!!!!!!!!!!!
    static function redact_migration($data_for_table,$file_name){
        $part1 = "
<?php

use App\Models\Subsection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('".$data_for_table["table_name"]."s"."', function (Blueprint \$table) {
        ";
        $table_name = $data_for_table["table_name"];
        unset($data_for_table["table_name"]);
        $part2 = "";
        $part2 = $part2."   \$table->id();\n";
        for($i = 0;$i<count($data_for_table); $i++){
            $part2 = $part2."           \$table->string('".key($data_for_table)."');\n";
            // echo ." = ". $data_for_table[key($data_for_table)]."________";
            next($data_for_table);
        }
        $part2 = $part2."           \$table->timestamps();";





        $part3 = "
        });
}

/**
 * Reverse the migrations.
 */
public function down(): void    
    {
    Schema::dropIfExists('budget_valumes');
    }
};";
        file_put_contents($file_name, [$part1,$part2,$part3]);
        ToolController::run_migration($data_for_table,$table_name);
        // dd($part1.$part2.$part3);
        return back();
    }
    static function search_migration($data_for_table){
        chdir('../database/migrations/');
        $instr = $data_for_table["table_name"];
        $instr = explode("_",$instr);
        $instr[count($instr)-1] = $instr[count($instr)-1]."s";
        // dd($instr);
        // dd("table.php"=="table");
        // dd(getcwd());
        // dd($instr[1]);
        for($i = 3;$i<count(scandir(".")); $i++){
            // echo scandir(".")[$i];
            $i_str=explode("_", scandir(".")[$i]);
            for($j = 3;$j<count($i_str); $j++){
                if($i_str[$j] == $instr[0]){
                    for($u = 1; $u!=count($instr); $u++){
                        // dd($instr[1]);
                        if($i_str[$j+$u] == $instr[$u]){
                            // dd(scandir(".")[$i]);
                            ToolController::redact_migration($data_for_table,scandir(".")[$i]);
                        }
                        else{
                            // break;
                        }

                    }
                    

                }
                // else {
                //     break;
                // }
            }
        }
        // dd(scandir("."));

        // $arr = file('2014_10_12_000000_create_users_table.php');
        // dd($arr);
    }


}