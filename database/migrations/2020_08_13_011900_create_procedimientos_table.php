<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos', function (Blueprint $table) {
            $table->id('id_procedimiento');
            $table->string('nombre');
            $table->text('anotacion')->nullable();
            $table->string('estado', 20);
            $table->date('fecha_inicio');
            $table->integer('id_usuario_responsable');
            $table->integer('id_programa');
            $table->integer('id_plantilla_procedimiento');

            $table->string('tipo'); 
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
        Schema::dropIfExists('procedimientos');
    }
}
