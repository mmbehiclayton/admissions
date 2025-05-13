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
        Schema::table('buses', function (Blueprint $table) {
        $table->string('owner')->after('capacity');
        $table->string('contact')->after('owner');
        $table->enum('type', ['Private', 'Public'])->after('contact');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buses', function (Blueprint $table) {
        $table->dropColumn(['owner', 'contact', 'type']);
        });
    }
};
