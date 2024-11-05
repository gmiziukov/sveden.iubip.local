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
        Schema::create('common_network_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsections::class)->constrained()->cascadeOnDelete();
            $table->string('number')->default(999);
            $table->string('address_implementation_activities', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_network_forms');
    }
};
