<?php

use Illuminate\Database\Seeder;

class LibrosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('libros')->delete();
        
        \DB::table('libros')->insert(array (
            0 => 
            array (
                'id' => 4,
                'titulo' => 'EL II MARQUÉS DE LOS VÉLEZ Y LA GUERRA CONTRA LOS MORISCOS',
                'autor' => 'Valeriano Sánchez Ramos',
                'subtitulo' => '1568-1571',
                'cubierta' => '/imagenes/cubierta.jpg',
                'created_at' => '2020-03-05 09:42:16',
                'updated_at' => '2020-03-05 09:42:16',
            ),
        ));
        
        
    }
}