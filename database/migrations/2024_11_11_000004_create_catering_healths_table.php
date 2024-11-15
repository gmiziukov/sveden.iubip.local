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
        Schema::create('catering_healths', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsection::class)->constrained()->cascadeOnDelete();
            $table->string('obj_name');
            $table->string('obj_address', 1000);
            $table->integer('obj_sq')->default(0);
            $table->integer('obj_cnt')->default(0);
            $table->string('obj_ovz', 5000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catering_healths');
    }
};
