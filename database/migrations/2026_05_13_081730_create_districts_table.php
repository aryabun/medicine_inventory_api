<?php

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
        Schema::create('districts', function (Blueprint $table) {
            $table->unsignedBigInteger('district_code')->primary();
            $table->unsignedBigInteger('province_code');
            $table->string('district_kh')->nullable();
            $table->string('district_en');
            $table->timestamps();

            $table->foreign('province_code')->references('province_code')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
