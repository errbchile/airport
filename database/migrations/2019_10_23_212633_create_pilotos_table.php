<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilotos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('horasdevuelo',11,1)->default(0);
            $table->integer('saldo')->default(0)->comment('CLP');
            $table->unsignedTinyInteger('piloto_tipo_id')->default(1);
            $table->foreign('piloto_tipo_id')->references('id')->on('piloto_tipos');
            $table->date('licencia_start')->nullable();
            $table->date('licencia_end')->nullable();
            $table->unsignedTinyInteger('licencia_tipo')->nullable();
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
        Schema::dropIfExists('pilotos');
    }
}
