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
        Schema::create('student_academic_history', function (Blueprint $table) {
            $table->id();
            $table->string("unique_id");
            $table->string("student_id");
            $table->string("class_id");
            $table->string("academic_year");
            $table->string("roll_number");
            $table->string("section");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_academic_history');
    }
};
