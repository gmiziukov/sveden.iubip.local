
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
        Schema::create('other_children', function (Blueprint $table) {
           $table->id();
           $table->string('_token');
           $table->string('fdsr');
           $table->string('iyu');
           $table->string('bvc');
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