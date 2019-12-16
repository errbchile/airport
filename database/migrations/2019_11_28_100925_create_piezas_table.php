<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiezasTable extends Migration
{
    public function up()
    {
        Schema::create('piezas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('pieza_tipo_id');
            $table->foreign('pieza_tipo_id')->references('id')->on('pieza_tipos');
            $table->unsignedInteger('pieza_fabricante_id');
            $table->foreign('pieza_fabricante_id')->references('id')->on('pieza_fabricantes');
            $table->unsignedInteger('airplane_model_id');
            $table->foreign('airplane_model_id')->references('id')->on('airplane_models');
            $table->string('partnumber')->nullable();
            $table->date('fechacompra')->nullable();
            $table->string('serie')->nullable();
            $table->date('tbofecha');
            $table->integer('tbohora');
            $table->unsignedTinyInteger('tipo')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('piezas');
    }
}
