<?php

use Illuminate\Database\Seeder;

class ImagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imagens')->insert([
            'titulo' => "titulo",
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 1,
        ]);
        DB::table('imagens')->insert([
            'titulo' => "titulo",
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 2,
        ]);
        DB::table('imagens')->insert([
            'titulo' => "titulo",
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 3,
        ]);
        DB::table('imagens')->insert([
            'titulo' => "titulo",
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 4,
        ]);
        DB::table('imagens')->insert([
            'titulo' => "titulo",
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 5,
        ]);
        DB::table('imagens')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 6,
        ]);
        DB::table('imagens')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 7,
        ]);
        DB::table('imagens')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 8,
        ]);
        DB::table('imagens')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'imagen' => Str::random(8).'.jpg',
            'capitulo_id' => 9,
        ]);
    }
}
