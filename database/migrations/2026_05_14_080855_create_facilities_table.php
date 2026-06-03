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
        Schema::create('facilities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('postal_code');
            $table->string('name_kh')->nullable();
            $table->string('name_en');
            $table->string('prefix')->nullable();
            $table->string('prefix_code')->nullable();
            $table->string('level')->nullable();
            $table->string('od')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('p_code')->nullable();
            $table->unsignedBigInteger('d_code')->nullable();
            $table->unsignedBigInteger('c_code')->nullable();
            $table->unsignedBigInteger('v_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('p_code')->references('province_code')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('d_code')->references('district_code')->on('districts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('c_code')->references('commune_code')->on('communes')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
