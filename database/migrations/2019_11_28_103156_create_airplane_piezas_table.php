<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplanePiezasTable extends Migration
{
    
    public function up()
    {
        Schema::create('airplane_piezas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes');
            $table->unsignedBigInteger('pieza_id');
            $table->foreign('pieza_id')->references('id')->on('piezas');
            $table->integer('horasdeuso');
            $table->integer('notidifusotbo')->nullable();
            $table->date('fechadeinstalacion');
            $table->longText('descripcion')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('airplane_piezas');
    }
}
