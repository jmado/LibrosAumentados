<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->varchar('titulo');
            $table->varchar('descripcion');
            $table->varchar('audio');
            $table->varchar('tipo_archivo');
            $table->int('capitulo_id');
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
        Schema::dropIfExists('descargas');
    }
}
