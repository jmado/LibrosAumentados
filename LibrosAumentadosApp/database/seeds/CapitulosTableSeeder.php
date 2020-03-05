<?php

use Illuminate\Database\Seeder;

class CapitulosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('capitulos')->delete();
        
        \DB::table('capitulos')->insert(array (
            0 => 
            array (
                'id' => 6,
                'numero_orden' => 1,
                'titulo' => 'Capitulo 1',
                'capitulo_padre_id' => 0,
                'libro_id' => 4,
                'created_at' => '2020-03-05 10:09:51',
                'updated_at' => '2020-03-05 10:09:51',
            ),
            1 => 
            array (
                'id' => 7,
                'numero_orden' => 2,
                'titulo' => 'Capitulo 2',
                'capitulo_padre_id' => 1,
                'libro_id' => 4,
                'created_at' => '2020-03-05 11:20:04',
                'updated_at' => '2020-03-05 11:20:04',
            ),
            2 => 
            array (
                'id' => 8,
                'numero_orden' => 3,
                'titulo' => 'Capitulo 3',
                'capitulo_padre_id' => 2,
                'libro_id' => 4,
                'created_at' => '2020-03-05 12:05:03',
                'updated_at' => '2020-03-05 12:05:03',
            ),
        ));
        
        
    }
}