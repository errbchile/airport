<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantencionTipoTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantencion_tipo_tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mantencion_tipo_id');
            $table->foreign('mantencion_tipo_id')->references('id')->on('mantencion_tipos');
            $table->unsignedBigInteger('mantencion_tarea_list_id');
            $table->foreign('mantencion_tarea_list_id')->references('id')->on('mantencion_tarea_lists');
            $table->longText('descripcion')->nullable();
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
        Schema::dropIfExists('mantencion_tipo_tareas');
    }
}
