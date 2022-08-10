<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Primero cree una migration (que es este file)
    public function up()
    {
        Schema::table('tareas_diarias', function (Blueprint $table) {
            // Le agrego una columna mas ala tabla 'tareas_diarias' que es el id de la Categoria de las tareas
            $table->bigInteger('Id_categoria')->unsigned();
            $table
                ->foreign('Id_categoria')
                ->references('id')
                ->on('categorias_tareas')
                ->after('titulo_categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tareas_diarias', function (Blueprint $table) {
            //
        });
    }
};
