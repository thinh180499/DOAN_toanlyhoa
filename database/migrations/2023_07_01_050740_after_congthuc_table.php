<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterCongthucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('congthuc', function (Blueprint $table) {
            $table->unsignedBigInteger('khainiem_id');
            $table->unsignedBigInteger('bieuthuc_id');

            $table->foreign('khainiem_id')->references('id')->on('khainiem');
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
