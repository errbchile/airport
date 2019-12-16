<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantencions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes');

            $table->unsignedBigInteger('mantencion_tipo_id');
            $table->foreign('mantencion_tipo_id')->references('id')->on('mantencion_tipos');

            $table->unsignedInteger('mecanico_id')->nullable();
            $table->foreign('mecanico_id')->references('id')->on('mecanicos');

            $table->unsignedBigInteger('vuelo_id')->nullable();
            $table->foreign('vuelo_id')->references('id')->on('vuelos');

            $table->decimal('tacometro',11,1);
            $table->date('fechasolicitud')->nullable();
            $table->date('fechacierre')->nullable();
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
        Schema::dropIfExists('mantencions');
    }
}
