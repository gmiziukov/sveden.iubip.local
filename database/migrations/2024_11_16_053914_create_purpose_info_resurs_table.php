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
        Schema::create('purpose_info_resurs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsection::class)->constrained()->cascadeOnDelete();
            $table->string('name_row_one', 255);
            $table->integer('number_row_one');
            $table->string('name_row_two', 255);
            $table->integer('number_row_two');
            $table->string('name_row_free', 255);
            $table->integer('number_row_free');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purpose_info_resurs');
    }
};
