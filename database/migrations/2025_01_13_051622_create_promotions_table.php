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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->string('promotion_title');
            $table->text('promotion_des');
            $table->unsignedBigInteger('promotion_sku_id');
            $table->integer('promotion_sku_qty');
            $table->unsignedBigInteger('foc_sku_id');
            $table->integer('foc_sku_qty');

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('promotion_sku_id')->references('id')->on('skus')->onDelete('cascade');
            $table->foreign('foc_sku_id')->references('id')->on('skus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};