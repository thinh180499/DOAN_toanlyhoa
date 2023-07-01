<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterCongthuccuamonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('congthuccuamon', function (Blueprint $table) {
            $table->unsignedBigInteger('congthuc_id');
            $table->unsignedBigInteger('mon_id');

            $table->foreign('congthuc_id')->references('id')->on('congthuc');
            $table->foreign('mon_id')->references('id')->on('mon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
