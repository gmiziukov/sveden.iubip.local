<?php

use App\Models\Subsections;
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
        Schema::create('catering_means', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsections::class)->constrained()->cascadeOnDelete();
            $table->string('obj_name');
            $table->string('obj_address', 1000);
            $table->string('obj_sq');
            $table->integer('obj_cnt');
            $table->string('obj_ovz');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catering_means');
    }
};
