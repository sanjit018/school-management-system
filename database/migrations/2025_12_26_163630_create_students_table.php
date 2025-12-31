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
            $table->id();
            $table->string("unique_id")->unique();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("contact")->unique();
            $table->string("fname");
            $table->string("mname");
            $table->date("dob");
            $table->string("gender");
            $table->string("admission_date");
            $table->string("roll_number")->nullable();
            $table->string("class")->nullable();
            $table->string("section")->nullable();
            $table->string("session");
            $table->string("profile")->nullable();
            $table->timestamps();
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
