<?php

use App\Models\Subsections;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Mockery\Matcher\Subset;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsections::class)->constrained()->cascadeOnDelete();
            $table->string('edu_code', 50);
            $table->string('edu_name');
            $table->string('edu_level');
            $table->string('edu_prof', 50);
            $table->string('edu_course', 50);
            $table->string('edu_form', 50);
            $table->integer('number_bf_vacant');
            $table->integer('number_br_vacant');
            $table->integer('number_bm_vacant');
            $table->integer('number_p_vacant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
