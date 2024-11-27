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
        Schema::create('purpose_hostel_inters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsection::class)->constrained()->cascadeOnDelete();
            $table->string('name_kolvo', 255);
            $table->integer('kolvo_hostel');
            $table->integer('kolvo_inter');
            $table->string('name_num', 255);
            $table->integer('num_hostel');
            $table->integer('num_inter');
            $table->string('name_numtwo', 255);
            $table->integer('numtwo_hostel');
            $table->integer('numtwo_inter');
            $table->string('name_num_ovz', 255);
            $table->integer('num_ovz_hostel');
            $table->integer('num_ovz_inter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purpose_hostel_inters');
    }
};
