<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCitizenship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employee_citizenship', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->longtext('citizenship');
            $table->integer('have_dual_citizenship');
            $table->integer('by_birth');
            $table->integer('by_naturalization');
            $table->string('country');
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
        Schema::dropIfExists('tbl_employee_citizenship');
    }
}
