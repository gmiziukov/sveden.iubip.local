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
        Schema::create('common_info_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subsections::class)->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('short_name');
            $table->date('reg_date');
            $table->string('address', 1000);
            $table->boolean('branch_organization');
            $table->boolean('representative_office_organization');
            $table->string('work_time', 50);
            $table->string('telephone', 50);
            $table->string('email', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_info_organizations');
    }
};
