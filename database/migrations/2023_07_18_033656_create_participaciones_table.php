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
        // Schema::create('participaciones', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre')->default('Anónimo');
        //     $table->string('email');
        //     $table->text('propuesta');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('participaciones');
    }
};