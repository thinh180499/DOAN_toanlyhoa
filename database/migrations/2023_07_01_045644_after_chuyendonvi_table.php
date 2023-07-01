<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterChuyendonviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chuyendonvi', function (Blueprint $table) {
            $table->unsignedBigInteger('tudonvi_id');
            $table->unsignedBigInteger('dendonvi_id');

            $table->foreign('tudonvi_id')->references('id')->on('donvi');
            $table->foreign('dendonvi_id')->references('id')->on('donvi');
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
