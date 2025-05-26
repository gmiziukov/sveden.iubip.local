
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
        Schema::create('tables_testings', function (Blueprint $table) {
           $table->id();
           $table->string('c1')->nullable($value = true);
           $table->integer('c1_doc_id')->nullable($value = true);
           $table->string('c2')->nullable($value = true);
           $table->integer('c2_doc_id')->nullable($value = true);
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