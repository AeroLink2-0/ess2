<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->longtext('house_block_lot_no');
            $table->longtext('street');
            $table->longtext('subdivision_or_village');
            $table->integer('barangay_id');
            $table->integer('citymun_id');
            $table->integer('province_id');
            $table->integer('region_id');
            $table->integer('is_permanent_address');
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
        Schema::dropIfExists('tbl_address');
    }
}
