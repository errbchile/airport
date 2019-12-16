<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotoHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piloto_horas', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->unsignedInteger('piloto_id');
            $table->foreign('piloto_id')->references('id')->on('pilotos');
            $table->decimal('horas',11,1);
            $table->decimal('acumuladas',11,1);
            $table->string('descripcion');
            $table->unsignedTinyInteger('tipo')->default(1);
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
        Schema::dropIfExists('piloto_horas');
    }
}
