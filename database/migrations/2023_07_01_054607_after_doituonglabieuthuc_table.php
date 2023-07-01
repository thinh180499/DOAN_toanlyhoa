<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterDoituonglabieuthucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doituonglabieuthuc', function (Blueprint $table) {
            $table->unsignedBigInteger('doituong_id');
            $table->unsignedBigInteger('bieuthuc_id');


            $table->foreign('doituong_id')->references('id')->on('doituong');
            $table->foreign('bieuthuc_id')->references('id')->on('bieuthuc');
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
