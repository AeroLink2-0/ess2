<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPayroll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->string('basic');
            $table->string('overtime');
            $table->string('allowance');
            $table->string('undertime');
            $table->string('late');
            $table->string('sss_no');
            $table->string('pag_ibig_no');
            $table->string('philhealth_no');
            $table->string('coop');
            $table->string('whold_tax');
            $table->string('sss_loan');
            $table->string('pag_ibig_loan');  
            $table->string('coop_loan');
            $table->string('cash_advance');
            $table->string('net_pay');
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
        Schema::dropIfExists('tbl_payroll');
    }
}
