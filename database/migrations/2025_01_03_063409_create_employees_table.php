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
        // Creating the employees table with foreign keys
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('employee_name');
            $table->string('father_name');
            $table->foreignId('designation_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->string('cnic');
            $table->string('emp_status');
            $table->text('postal_addr');
            $table->string('contact_numb');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->json('week_of_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the foreign key relationships first
        Schema::dropIfExists('employees');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('user_categories');
        Schema::dropIfExists('designations');
    }
};
