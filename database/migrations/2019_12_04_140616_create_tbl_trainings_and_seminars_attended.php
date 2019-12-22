<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTrainingsAndSeminarsAttended extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trainings_and_seminars_attended', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->longtext('title_of_training');
            $table->string('date_from');
            $table->string('date_to');
            $table->longtext('conducted_by');
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
        Schema::dropIfExists('tbl_trainings_and_seminars_attended');
    }
}
