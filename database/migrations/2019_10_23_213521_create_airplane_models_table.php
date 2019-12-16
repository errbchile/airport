<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplaneModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('airplane_brand_id');
            $table->foreign('airplane_brand_id')->references('id')->on('airplane_brands');
            $table->string('nombre');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('airplane_models');
    }
}
