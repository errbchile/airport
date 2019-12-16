<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVueloTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo_tipos', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nombre');
            $table->unsignedInteger('monto')->default(0)->comment('CLP/hora');
            $table->decimal('min_hora',2,1)->default(0);
            $table->unsignedTinyInteger('eliminable')->default(1);
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
        Schema::dropIfExists('vuelo_tipos');
    }
}
