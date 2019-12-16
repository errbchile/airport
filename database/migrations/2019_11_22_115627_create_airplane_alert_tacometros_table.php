<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplaneAlertTacometrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_alert_tacometros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes');
            $table->unsignedBigInteger('vuelo_id')->nullable();
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->decimal('inicial',11,1);
            $table->decimal('final',11,1);
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('airplane_alert_tacometros');
    }
}
