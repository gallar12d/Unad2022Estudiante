<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadPlantillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_plantillas', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->string('descripcion');
            $table->string('tipo', 20);
            $table->string('paralela', 20)->nullable();
            $table->integer('tiempo');
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
        Schema::dropIfExists('actividad_plantillas');
    }
}
