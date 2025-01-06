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
        Schema::table('student_data', function (Blueprint $table) {
            $table->string('dell_event_attendance_talk_1')->nullable();
            $table->string('dell_event_attendance_talk_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_data', function (Blueprint $table) {
            $table->dropColumn('dell_event_attendance_talk_1');
            $table->dropColumn('dell_event_attendance_talk_2');
        });
    }
};
