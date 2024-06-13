<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnersTable extends Migration
{
    public function up()
    {
        Schema::create('learners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stream_id');
            $table->string('name');
            $table->string('adm_no');
            $table->string('gender');
            $table->date('dob');
            $table->string('birth_cert_no');
            $table->string('nationality');
            $table->string('nemis_code')->nullable();
            $table->date('doa'); // Date of Admission
            $table->string('contact');
            $table->timestamps();

            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('learners');
    }
};

