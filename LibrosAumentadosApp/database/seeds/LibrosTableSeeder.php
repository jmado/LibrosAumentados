<?php

use Illuminate\Database\Seeder;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('libros')->insert([
            'titulo' => 'Animales fantásticos',
            'subtitulo' => Str::random(8).'.com',
            'cubierta' => Str::random(8).'.jpg',
            'autor' => 'pepe',
        ]);
        DB::table('libros')->insert([
            'titulo' => 'Señor de los anillos',
            'subtitulo' => Str::random(8).'.com',
            'cubierta' => Str::random(8).'.jpg',
            'autor' => 'adri',
        ]);
        DB::table('libros')->insert([
            'titulo' => 'Rapidos y furiosos',
            'subtitulo' => Str::random(8).'.com',
            'cubierta' => Str::random(8).'.jpg',
            'autor' => 'jose',
        ]);
    }
}
