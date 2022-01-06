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
            $table->integer('Proposal_ID');
            $table->integer('Student_ID');
            $table->integer('Lecturer_ID');
            $table->string('Proposal_Title');
            $table->string('Proposal_Type');
            $table->string('SV_Name');
            $table->string('Proposal_Status')->default('pending');
            $table->string('Proposal_Doc');
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
