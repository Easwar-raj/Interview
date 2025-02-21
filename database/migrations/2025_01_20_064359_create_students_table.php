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
        Schema::create('students', function (Blueprint $table) {
            $table->id();  // auto-increment ID
            $table->string('full_name');
            $table->string('contact_number');
            $table->string('email')->unique();  // ensure the email is unique
            $table->string('college_name');
            $table->string('degree_specialization');
            $table->string('area_of_intrest')->default(''); ;
            $table->date('graduation_date');
            $table->string('roll_number')->unique();  // ensure the roll number is unique
            $table->timestamps(); // created_at, updated_at
        });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
