
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
        Schema::create('proto_tables', function (Blueprint $table) {
           $table->id();
           $table->string('page_name');
           $table->string('input_type');
           $table->string('teg_table');
           $table->string('col1');
           $table->string('col2');
           $table->string('col3');
           $table->string('col4');
           $table->timestamps();
        });
}

/**
 * Reverse the migrations.
 */
public function down(): void    
    {
    Schema::dropIfExists('budget_valumes');
    }
};