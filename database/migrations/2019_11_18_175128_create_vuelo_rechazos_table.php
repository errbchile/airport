<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVueloRechazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo_rechazos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vuelo_id');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->unsignedTinyInteger('tipo');
            $table->longText('comentarios')->nullable();
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
        Schema::dropIfExists('vuelo_rechazos');
    }
}
