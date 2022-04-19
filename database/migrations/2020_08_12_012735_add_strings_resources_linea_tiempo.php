<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStringsResourcesLineaTiempo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('linea_tiempos', function (Blueprint $table) {
            $table->string('json_insumos', 900)->nullable();
            $table->string('json_productos', 900)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('linea_tiempos', function (Blueprint $table) {
            //
        });
    }
}
