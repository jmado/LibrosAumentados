<?php

use Illuminate\Database\Seeder;

class GaleriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('galerias')->delete();
        
        \DB::table('galerias')->insert(array (
            0 => 
            array (
                'id' => 21,
                'titulo' => 'Galería Aben Humeya',
                'descripcion' => 'Abén Humeya fue noble morisco, de nombre cristiano Hernando o Fernando de Válor y Córdoba y de nombre musulmán Muhammad ibn Umayya.',
                'tipo' => 'normal',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:42:00',
                'updated_at' => '2020-03-05 11:42:00',
            ),
            1 => 
            array (
                'id' => 22,
                'titulo' => 'Galeria Fajardo De La Cueva',
            'descripcion' => 'Luis Yáñez Fajardo de la Cueva (Vélez-Blanco o Murcia, 1508 o h. 1509 – Vélez-Blanco, 1574/1575) fue un noble, político y militar español perteneciente a la Casa de Fajardo, titulado II marqués de los Vélez, grande de España y I marqués de Molina (1535).',
                'tipo' => 'normal',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:45:10',
                'updated_at' => '2020-03-05 11:45:10',
            ),
            2 => 
            array (
                'id' => 23,
                'titulo' => 'Transparencia Mapa Fajardo',
                'descripcion' => 'Posesiones de los Fajardo en el siglo XVI',
                'tipo' => 'transparencia',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:48:07',
                'updated_at' => '2020-03-05 11:48:07',
            ),
        ));
        
        
    }
}