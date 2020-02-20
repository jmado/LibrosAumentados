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
        DB::table('audio')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'archivo' => Str::random(8).'.mp3',
            'capitulo_id' => 1,
        ]);
        
    }
}
