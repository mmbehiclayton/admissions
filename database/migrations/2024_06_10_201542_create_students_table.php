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
            $table->integer('streams_id');
            $table->string('assessment_no');
            $table->string('name');
            $table->string('admission_no');
            $table->string('gender');
            $table->string('dob');
            $table->string('bc_pp_entry_no');
            $table->string('nationality');
            $table->string('nemis_code');
            $table->string('date_of_addmission');
            $table->string('contact');
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
