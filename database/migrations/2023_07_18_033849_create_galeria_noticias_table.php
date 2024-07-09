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
        Schema::create('galeria_noticias', function (Blueprint $table) {
            $table->id();
            $table->string('imagen', 100);

            $table->unsignedbigInteger('id_noticia');

            $table->foreign('id_noticia')
                ->references('id')
                ->on('noticias')->onDelete('cascade');
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
        Schema::dropIfExists('galeria_noticias');
    }
};