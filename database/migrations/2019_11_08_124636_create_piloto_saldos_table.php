<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotoSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piloto_saldos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('piloto_id');
            $table->foreign('piloto_id')->references('id')->on('pilotos');
            $table->bigInteger('monto');
            $table->bigInteger('saldoactual');
            $table->dateTime('fecha');
            $table->longText('descripcion')->nullable();
            $table->unsignedTinyInteger('tipo')->nullable();
            $table->unsignedTinyInteger('forma_pago')->nullable();
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
        Schema::dropIfExists('piloto_saldos');
    }
}
