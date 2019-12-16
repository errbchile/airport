<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplanes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patente');
            $table->unsignedInteger('airplane_model_id');
            $table->foreign('airplane_model_id')->references('id')->on('airplane_models');
            $table->year('permiso');
            $table->decimal('horasactuales',11,1)->default(0);
            $table->decimal('horasdevuelo',11,1)->default(0);
            $table->date('vencimiento');
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
        Schema::dropIfExists('airplanes');
    }
}
