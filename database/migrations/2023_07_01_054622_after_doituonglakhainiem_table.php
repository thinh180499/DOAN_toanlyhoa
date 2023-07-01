<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterDoituonglakhainiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doituonglakhainiem', function (Blueprint $table) {
            $table->unsignedBigInteger('doituong_id');
            $table->unsignedBigInteger('khainiem_id');


            $table->foreign('doituong_id')->references('id')->on('doituong');
            $table->foreign('khainiem_id')->references('id')->on('khainiem');

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
