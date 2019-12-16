<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotoAirplaneModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piloto_airplane_models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('piloto_id');
            $table->foreign('piloto_id')->references('id')->on('pilotos');
            $table->unsignedInteger('airplane_model_id');
            $table->foreign('airplane_model_id')->references('id')->on('airplane_models');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('piloto_airplane_models');
    }
}
