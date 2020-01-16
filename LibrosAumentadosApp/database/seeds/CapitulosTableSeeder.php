<?php

use Illuminate\Database\Seeder;

class CapitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Libro 1
        DB::table('capitulos')->insert([
            'numero_orden' => 1,
            'titulo' => "uno",
            'capitulo_padre_id' => 0,
            'libro_id' => 1,
        ]);
        DB::table('capitulos')->insert([
            'numero_orden' => 2,
            'titulo' => "dos",
            'capitulo_padre_id' => 1,
            'libro_id' => 1,
        ]);
        DB::table('capitulos')->insert([
            'numero_orden' => 3,
            'titulo' => "tres",
            'capitulo_padre_id' => 2,
            'libro_id' => 1,
        ]);
        //Libro 2
        DB::table('capitulos')->insert([
            'numero_orden' => 1,
            'titulo' => "cuatro",
            'capitulo_padre_id' => 0,
            'libro_id' => 2,
        ]);
        DB::table('capitulos')->insert([
            'numero_orden' => 2,
            'titulo' => "cinco",
            'capitulo_padre_id' => 1,
            'libro_id' => 2,
        ]);
        DB::table('capitulos')->insert([
            'numero_orden' => 3,
            'titulo' =>"seis",
            'capitulo_padre_id' => 2,
            'libro_id' => 2,
        ]);
        //Libro 3
        DB::table('capitulos')->insert([
            'numero_orden' => 1,
            'titulo' => "siete",
            'capitulo_padre_id' => 0,
            'libro_id' => 3,
        ]);
        DB::table('capitulos')->insert([
            'numero_orden' => 2,
            'titulo' => "ocho",
            'capitulo_padre_id' => 1,
            'libro_id' => 3,
        ]);
        DB::table('capitulos')->insert([
            'numero_orden' => 3,
            'titulo' => "nueve",
            'capitulo_padre_id' => 2,
            'libro_id' => 3,
        ]);
    }
}
