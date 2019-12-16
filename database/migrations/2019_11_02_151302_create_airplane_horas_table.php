<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplaneHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_horas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('fecha');
            $table->unsignedInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes');
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
        Schema::dropIfExists('airplane_horas');
    }
}
