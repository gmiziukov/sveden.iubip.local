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
        Schema::create('common_places_of_educationals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsection::class)->constrained()->cascadeOnDelete();
            $table->string('number', 500);
            $table->string('address_implementation_activities', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_places_of_educationals');
    }
};
