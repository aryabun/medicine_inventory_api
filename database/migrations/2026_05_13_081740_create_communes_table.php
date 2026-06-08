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
        Schema::create('communes', function (Blueprint $table) {
            $table->unsignedBigInteger('commune_code')->primary();
            $table->unsignedBigInteger('province_code');
            $table->unsignedBigInteger('district_code');
            $table->string('commune_kh')->nullable();
            $table->string('commune_en');
            $table->timestamps();

            $table->foreign('province_code')->references('province_code')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('district_code')->references('district_code')->on('districts')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communes');
    }
};
