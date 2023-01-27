<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('Student_ID', 10);
            $table->string('Lecturer_ID', 10);
            $table->string('Student_Name', 255);
            $table->string('Student_Email', 255);
            $table->string('Student_PhoneNo', 15);
            $table->string('Student_Major', 255);
            $table->integer('Student_Year', 255);
            $table->integer('PSM_Level');
            $table->string('Student_Image', 100);
            $table->foreign('Lecturer_ID')->references('Lecturer_ID')->on('lecturer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
