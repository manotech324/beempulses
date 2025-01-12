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
        Schema::create('shops', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('name');
            $table->string('contact_person');
            $table->string('owner');
            $table->string('contact');
            $table->float('shop_size'); // Floating-point for shop size
            $table->unsignedBigInteger('region_id'); // Foreign key to regions table
            $table->unsignedBigInteger('city_id'); // Foreign key to cities table
            $table->decimal('latitude', 10, 7); // Precise latitude
            $table->decimal('longitude', 10, 7); // Precise longitude
            $table->string('city');
            $table->text('shop_data'); // For larger textual data
            $table->integer('shop_code')->unique(); // Unique shop code
            $table->unsignedBigInteger('area_id'); // Foreign key to areas table
            $table->unsignedBigInteger('shop_category_id'); // Foreign key to shop categories
            $table->string('qr'); // For storing QR code data
            $table->float('credit_limit'); // Floating-point for credit limit
            $table->string('cnic'); // CNIC stored as string for proper formatting
            $table->string('type');
            $table->string('ntn'); // Stored as string for formatting consistency
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('shop_category_id')->references('id')->on('shop_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
