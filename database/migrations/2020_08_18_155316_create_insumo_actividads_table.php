<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumoActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo_actividades', function (Blueprint $table) {
            $table->id('id_insumo');
            $table->integer('id_actividad');
            $table->integer('id_tipo_recurso');
            $table->string('observacion', 500)->nullable();
            $table->string('privacidad', 30);
            $table->string('estado', 30)->nullable();

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
        Schema::dropIfExists('insumo_actividads');
    }
}
