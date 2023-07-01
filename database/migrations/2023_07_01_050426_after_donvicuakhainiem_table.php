<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterDonvicuakhainiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donvicuakhainiem', function (Blueprint $table) {
            $table->unsignedBigInteger('khainiem_id');
            $table->unsignedBigInteger('donvi_id');

            $table->foreign('khainiem_id')->references('id')->on('khainiem');
            $table->foreign('donvi_id')->references('id')->on('donvi');
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
