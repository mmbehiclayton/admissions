<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB; // important!

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'co_curricular_activity')) {
                $table->string('co_curricular_activity')->after('contact');
            }

            if (!Schema::hasColumn('students', 'transport_route')) {
                $table->string('transport_route')->after('co_curricular_activity');
            }
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (Schema::hasColumn('students', 'co_curricular_activity')) {
                $table->dropColumn('co_curricular_activity');
            }

            if (Schema::hasColumn('students', 'transport_route')) {
                $table->dropColumn('transport_route');
            }
        });
    }
};
