<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

class CreateRepositoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositorios', function (Blueprint $table) {
            $table->id('id_repositorio');
            $table->integer('id_recurso');
            $table->integer('id_procedimiento');
            $table->integer('id_actividad');
            $table->integer('id_tipo_recurso');
            $table->date('fecha_registro');
            $table->string('origen');
            $table->string('ruta_recurso', 500);
            $table->integer('version');
            $table->string('tipo', 30);
            $table->string('id_usuario_registro');
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
        Schema::dropIfExists('repositorios');
    }
}
