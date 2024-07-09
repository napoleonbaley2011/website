<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('noticias', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('titulo', 200);
            // $table->text('cuerpo')->nullable();
            // $table->text('resumen')->nullable();
            // $table->date('fecha');
            // $table->integer('tipo');
            // $table->string('archivo', 100);

            $table->string('tipo_publicacion')->default('nacional');
            $table->string('categoria')->default('PAIS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('noticias');

        // Schema::table('noticias', function (Blueprint $table) {
        //     $table->dropColumn('tipo');
        // });
    }
};