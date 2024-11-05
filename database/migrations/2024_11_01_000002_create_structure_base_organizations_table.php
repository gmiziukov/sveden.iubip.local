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
        Schema::create('structure_base_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsections::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('fio');
            $table->string('post');
            $table->string('address_str', 1000);
            $table->string('site', 50);
            $table->string('email', 50);
            $table->string('name_file', 255);
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
        Schema::dropIfExists('structure_base_organizations');
    }
};
