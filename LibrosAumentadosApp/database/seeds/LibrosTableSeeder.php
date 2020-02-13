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
            'titulo' => 'Juego de tronos',
            'subtitulo' => 'Cancion de hielo y fuego',
            'cubierta' => Str::random(8).'.jpg',
            'autor' => 'George R.R. Martin',
        ]);
        DB::table('libros')->insert([
            'titulo' => 'Choque de reyes',
            'subtitulo' => 'Cancio de hielo y fuego',
            'cubierta' => Str::random(8).'.jpg',
            'autor' => 'George R.R. Martin',
        ]);
        DB::table('libros')->insert([
            'titulo' => 'Rapidos y furiosos',
            'subtitulo' => Str::random(8).'.com',
            'cubierta' => Str::random(8).'.jpg',
            'autor' => 'jose',
        ]);
    }
}
