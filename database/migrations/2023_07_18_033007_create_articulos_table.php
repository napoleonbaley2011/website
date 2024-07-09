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
        // Schema::create('articulos', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('imagen', 100);
        //     $table->string('titulo', 200);
        //     $table->text('cuerpo')->nullable();
        //     $table->text('resumen')->nullable();
        //     $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
        //     $table->unsignedbigInteger('id_barrio');

        //     $table->foreign('id_barrio')
        //         ->references('id')
        //         ->on('barrios')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('articulos');
    }
};