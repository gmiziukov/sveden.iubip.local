
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
        Schema::create('nn_tables', function (Blueprint $table) {
           $table->id();
           $table->string('col1')->nullable($value = true);
           $table->integer('col1_doc_id')->nullable($value = true);
           $table->string('col2')->nullable($value = true);
           $table->integer('col2_doc_id')->nullable($value = true);
           $table->string('col3')->nullable($value = true);
           $table->integer('col3_doc_id')->nullable($value = true);
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