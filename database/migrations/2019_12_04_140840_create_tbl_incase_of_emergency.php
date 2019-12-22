<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblIncaseOfEmergency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_incase_of_emergency', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->longtext('complete_name');
            $table->string('contact_number');
            $table->string('relationship');
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
        Schema::dropIfExists('tbl_incase_of_emergency');
    }
}
