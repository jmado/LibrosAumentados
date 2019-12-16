<?php

use Illuminate\Database\Seeder;

class Modelo_3dsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelo_3ds')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'modelo_3d' => Str::random(8),
            'capitulo_id' => 1,
        ]);
        DB::table('modelo_3ds')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'modelo_3d' => Str::random(8),
            'capitulo_id' => 2,
        ]);
        DB::table('modelo_3ds')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'modelo_3d' => Str::random(8),
            'capitulo_id' => 3,
        ]);
    }
}
