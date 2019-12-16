<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'video' => Str::random(8).'.mp4',
            'capitulo_id' => 1,
        ]);
        DB::table('videos')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'video' => Str::random(8).'.mp4',
            'capitulo_id' => 2,
        ]);
        DB::table('videos')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'video' => Str::random(8).'.mp4',
            'capitulo_id' => 3,
        ]);
        DB::table('videos')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'video' => Str::random(8).'.mp4',
            'capitulo_id' => 4,
        ]);
    }
}
