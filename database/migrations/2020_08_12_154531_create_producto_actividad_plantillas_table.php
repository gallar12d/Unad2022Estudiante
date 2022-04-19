<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoActividadPlantillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_actividad_plantillas', function (Blueprint $table) {
            $table->id('id_producto_actividad_plantilla');
            $table->integer('id_tipo_recurso');
            $table->integer('id_item');
            $table->string('observacion', 500)->nullable();
            $table->string('privacidad');
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
        Schema::dropIfExists('producto_actividad_plantillas');
    }
}
