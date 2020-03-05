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
        \DB::table('galeria_imagen')->delete();
        
        \DB::table('galeria_imagen')->insert(array (
            0 => 
            array (
                'id' => 65,
                'galeria_id' => 21,
                'imagen_id' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 66,
                'galeria_id' => 21,
                'imagen_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 67,
                'galeria_id' => 21,
                'imagen_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 68,
                'galeria_id' => 22,
                'imagen_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 69,
                'galeria_id' => 22,
                'imagen_id' => 54,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 70,
                'galeria_id' => 22,
                'imagen_id' => 55,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 71,
                'galeria_id' => 23,
                'imagen_id' => 56,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 72,
                'galeria_id' => 23,
                'imagen_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 73,
                'galeria_id' => 23,
                'imagen_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
