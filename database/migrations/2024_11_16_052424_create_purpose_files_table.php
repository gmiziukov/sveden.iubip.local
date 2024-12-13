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
        Schema::create('purpose_files', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsection::class)->constrained()->cascadeOnDelete();
            $table->string('name', 1000);
            $table->string('name_file', 1000);
            $table->string('path_to_file', 2048);
            $table->string('extension', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purpose_files');
    }
};
