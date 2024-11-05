<?php

use App\Models\Sections;
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
        Schema::create('subsections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sections::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('sub_part');
            $table->integer('sort')->default(999);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsections');
    }
};
