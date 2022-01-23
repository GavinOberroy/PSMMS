<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->String('Student_Name');
            $table->String('Student_ID');
            $table->string('Proposal_Title');
            $table->string('Proposal_Type');
            $table->string('SV_Name');
            $table->string('Proposal_Status')->default('pending');
            $table->string('file');
           // $table->foreignId('Student_ID');
           //  $table->foreign('Student_ID')->references('Student_ID')->on('student');
           // $table->foreign('Student_ID')->references('Student_ID')->on('student')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
