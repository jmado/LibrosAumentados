<?php

use Illuminate\Database\Seeder;

class DescargasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descargas')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'archivo' => Str::random(8),
            'tipo_archivo' => Str::random(8),
            'capitulo_id' => 1,
        ]);
        DB::table('descargas')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'archivo' => Str::random(8),
            'tipo_archivo' => Str::random(8),
            'capitulo_id' => 2,
        ]);
        DB::table('descargas')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'archivo' => Str::random(8),
            'tipo_archivo' => Str::random(8),
            'capitulo_id' => 3,
        ]);   
    }
}
