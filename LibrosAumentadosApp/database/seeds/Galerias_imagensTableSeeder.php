<?php

use Illuminate\Database\Seeder;

class Galerias_imagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galeria_imagen')->insert([
            'galeria_id' => 1,
            'imagen_id' => 1,
        ]);
        DB::table('galeria_imagen')->insert([
            'galeria_id' => 2,
            'imagen_id' => 2,
        ]);
        DB::table('galeria_imagen')->insert([
            'galeria_id' => 3,
            'imagen_id' => 3,
        ]);
    }
}
