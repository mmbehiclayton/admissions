<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolClassIdToLearnersTable extends Migration
{
    public function up()
    {
        Schema::table('learners', function (Blueprint $table) {
            $table->unsignedBigInteger('school_class_id')->after('stream_id');

            $table->foreign('school_class_id')->references('id')->on('school_classes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('learners', function (Blueprint $table) {
            $table->dropForeign(['school_class_id']);
            $table->dropColumn('school_class_id');
        });
    }
}
