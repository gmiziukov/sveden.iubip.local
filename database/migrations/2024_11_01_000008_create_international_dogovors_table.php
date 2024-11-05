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
        Schema::create('international_dogovors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsections::class)->constrained()->cascadeOnDelete();
            $table->string('state_name');
            $table->string('org_name');
            $table->string('dog_reg', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('international_dogovors');
    }
};
