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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->date('exp_date');
            $table->string('batch_no');
            $table->integer('current_stock')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('facility_id')->references('id')->on('facilities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['product_id', 'facility_id', 'batch_no']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
