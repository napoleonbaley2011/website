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
        // Schema::create('galerias', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('imagen', 100);

        //     $table->unsignedbigInteger('id_articulo');

        //     $table->foreign('id_articulo')
        //     ->references('id')
        //     ->on('articulos')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('galerias');
    }
};