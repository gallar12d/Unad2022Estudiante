<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->string('descripcion', 500);
            $table->string('tipo', 20);
            $table->date('fecha_inicio');
            $table->date('fecha_cierre');
            $table->integer('id_procedimiento', 255);
            $table->string('estado', 30);
            $table->text('observacion')->nullable();
            $table->integer('orden');
            $table->integer('tiempo', 20);
            $table->string('paralela');
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
        Schema::dropIfExists('actividads');
    }
}
