<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer', function (Blueprint $table) {
            $table->String('Lecturer_ID', 10)->primary(); 
            $table->string('Lecturer_Name', 255);
            $table->string('Lecturer_Email', 255);
            $table->string('Lecturer_OfficeNo', 10);
            $table->string('Lecturer_Biography', 255);
            $table->string('Lecturer_Image', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer');
    }
}
