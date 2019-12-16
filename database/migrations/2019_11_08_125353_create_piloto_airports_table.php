<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotoAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piloto_airports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('piloto_id');
            $table->foreign('piloto_id')->references('id')->on('pilotos');
            $table->unsignedInteger('airport_id');
            $table->foreign('airport_id')->references('id')->on('airports');
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('piloto_airports');
    }
}
