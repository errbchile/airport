<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVueloBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo_bitacoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vuelo_id');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->unsignedInteger('airport_id');
            $table->foreign('airport_id')->references('id')->on('airports');
            $table->dateTime('fecha');
            $table->decimal('tacometro',11,1);
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
        Schema::dropIfExists('vuelo_bitacoras');
    }
}
