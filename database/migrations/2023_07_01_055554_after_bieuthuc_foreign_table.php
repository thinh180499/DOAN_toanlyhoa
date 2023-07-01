<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterBieuthucForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bieuthuc', function (Blueprint $table) {
            $table->unsignedBigInteger('vetrai');
            $table->unsignedBigInteger('vephai');
            $table->unsignedBigInteger('loaipheptoan_id');

            $table->foreign('vetrai')->references('id')->on('doituong');
            $table->foreign('vephai')->references('id')->on('doituong');
            $table->foreign('loaipheptoan_id')->references('id')->on('loaipheptoan');
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
