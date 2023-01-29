<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('students', function (Blueprint $table) {
            $table->softDeletes();
            $table->unsignedSmallInteger('status')->comment('StudentStatusEnum')->index();
            $table->foreignId('course_id')->constrained('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('students', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn(['status']);
            $table->dropForeign(['course_id']);
        });
    }
};
