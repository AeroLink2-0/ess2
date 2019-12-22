<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTblBasicInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_basic_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->string('firstname');
            $table->string('middlename');    
            $table->string('lastname');
            $table->integer('suffix_id');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('sex_id');
            $table->string('civil_status_id');
            $table->string('citizenship_id');
            $table->string('height');
            $table->string('weight');
            $table->string('blood_type');
            $table->string('email');
            $table->string('contact_number');
            $table->string('emp_img');
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
        Schema::dropIfExists('tbl_basic_information');
    }
}
