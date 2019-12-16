<?php

use Illuminate\Database\Seeder;

class AudiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audios')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'audio' => Str::random(8).'.mp3',
            'capitulo_id' => 1,
        ]);
        DB::table('audios')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'audio' => Str::random(8).'.mp3',
            'capitulo_id' => 2,
        ]);
        DB::table('audios')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'audio' => Str::random(8).'.mp3',
            'capitulo_id' => 3,
        ]);
        DB::table('audios')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'audio' => Str::random(8).'.mp3',
            'capitulo_id' => 4,
        ]);
        DB::table('audios')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'audio' => Str::random(8).'.mp3',
            'capitulo_id' => 5,
        ]);
    }
}
