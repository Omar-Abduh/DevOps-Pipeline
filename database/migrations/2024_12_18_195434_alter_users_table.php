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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('academic_year_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('major_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('admission_date')->nullable();
            $table->string('sut_id')->nullable();
            $table->string('major')->nullable();
            $table->string('mobno')->nullable();
            $table->string('dob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_academic_year_id_foreign');
            $table->dropForeign('users_major_id_foreign');
            $table->dropColumn('academic_year_id');
            $table->dropColumn('major_id');
            $table->dropColumn('admission_date');
            $table->dropColumn('sut_id');
            $table->dropColumn('major');
            $table->dropColumn('mobno');
            $table->dropColumn('dob');
        });
    }
};
