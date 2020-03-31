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
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('archivo');
            
            $table->enum('tipo_archivo', ['pdf', 'txt']);
            $table->integer('capitulo_id');
            $table->timestamps();
        });
        /*
        Schema::table('descargas', function (Blueprint $table) {
            $table->dropColumn('tipo_archivo');
        });
        */
        
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
