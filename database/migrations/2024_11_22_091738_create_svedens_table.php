<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('svedens', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("path");
            $table->integer("position");
            $table->boolean("hidden")->default(0);
            $table->json("data_json")->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('svedens');
    }
};
