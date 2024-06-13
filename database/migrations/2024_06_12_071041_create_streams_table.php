<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamsTable extends Migration
{
    public function up()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_class_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('school_class_id')->references('id')->on('school_classes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('streams');
    }
}
