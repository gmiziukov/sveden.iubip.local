<?php

namespace App\Http\Controllers\Redactor\Redactor\Table\Migration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Redactor\Redactor\Table\Migration\RunMigrationController;


// -> SearchMigrationController


class RedactMigrationController extends Controller
{
    function __constructor(){

    }
    static public function index($data_for_table,$file_name){
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
        Schema::create('".Str::plural( $data_for_table["table_name"])."', function (Blueprint \$table) {
        ";
        $table_name = $data_for_table["table_name"];
        $time_data = $data_for_table;
        unset($time_data["input_type"]);
        unset($time_data["page_name"]);
        unset($time_data["table_name"]);
        unset($time_data["teg_table"]);
        unset($time_data["but"]);
        unset($time_data["_token"]);
        unset($data_for_table["name_table"]);
        $part2 = "";
        $part2 = $part2."   \$table->id();\n";
        for($i = 0;$i<count($time_data); $i++){
            $part2 = $part2."           \$table->string('".key($time_data)."');\n";
            next($time_data);
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
        RunMigrationController::index($data_for_table,$table_name);

    }
}
