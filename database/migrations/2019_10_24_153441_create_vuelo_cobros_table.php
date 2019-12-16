<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVueloCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo_cobros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vuelo_id');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->unsignedTinyInteger('pasajeros');
            $table->decimal('tacometro',11,1)->nullable();
            $table->unsignedInteger('tiempo_vuelo')->nullable()->comment('segundos');
            $table->bigInteger('monto')->nullable()->comment('CLP');
            $table->unsignedTinyInteger('excepcion')->nullable();
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
        Schema::dropIfExists('vuelo_cobros');
    }
}
