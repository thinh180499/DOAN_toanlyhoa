<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhainiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khainiems', function (Blueprint $table) {
            $table->id();
            $table->string('khainiem_id')->unique();
            $table->string('tenkhainiem');
            $table->text('dinhnghia');
            $table->string('kyhieu');
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
        Schema::dropIfExists('khainiems');
    }
}
