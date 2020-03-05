<?php

use Illuminate\Database\Seeder;

class ImagensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('imagens')->delete();
        
        \DB::table('imagens')->insert(array (
            0 => 
            array (
                'id' => 45,
            'titulo' => 'Caballería (Página 10)',
                'descripcion' => 'Ilustración de Carmen Cano. La caballería fue un elemento esencial en la batalla de Berja. Dirigida personalmente por D. Luis Fajardo y sus hombres de confianza, se convirtió en un arma mortífera para los moriscos.',
                'imagen' => 'imagenes/cap01-pag10.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:11:49',
                'updated_at' => '2020-03-05 11:11:49',
            ),
            1 => 
            array (
                'id' => 46,
            'titulo' => 'El marqúes a caballo (Página 11)',
                'descripcion' => 'Ilustración de Carmen Cano. El ímpetu de D. Luis no se contuvo en la batalla de Válor, sino que arremetió sierra arriba hasta llegar a La Calahorra.',
                'imagen' => 'imagenes/cap01-pag11.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:15:05',
                'updated_at' => '2020-03-05 11:16:03',
            ),
            2 => 
            array (
                'id' => 47,
            'titulo' => 'El general retirado (Página 18)',
                'descripcion' => 'Ilustación por Carmen Cano. Desde el primer tercio de 1570, refugiado en su castillo de Vélez Blanco, D. Luis Fajardo veía consternado cómo el descrédito caía sobre su persona. En declive desde entonces, el honor de un general se venía abajo.',
                'imagen' => 'imagenes/cap01-pag18.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:18:00',
                'updated_at' => '2020-03-05 11:18:00',
            ),
            3 => 
            array (
                'id' => 48,
            'titulo' => 'Militares (Página 20)',
                'descripcion' => 'Ilustración por Carmen Cano. La guerra alpujarreña obligó a disponer de un fuerte contingente militar de forma permanente.',
                'imagen' => 'imagenes/cap01-pag20.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:18:47',
                'updated_at' => '2020-03-05 11:18:47',
            ),
            4 => 
            array (
                'id' => 49,
            'titulo' => 'Soldados (Página 34)',
                'descripcion' => 'Ilustración por Carmen Cano. Vélez Blanco era un hervidero de soldados en los primeros días de enero de 1569',
                'imagen' => 'imagenes/cap01-pag34.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:19:32',
                'updated_at' => '2020-03-05 11:19:32',
            ),
            5 => 
            array (
                'id' => 50,
                'titulo' => 'Galeria pag 15',
                'descripcion' => 'Galeria pag 15',
                'imagen' => 'imagenes/cap01-pag15-img01.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:38:34',
                'updated_at' => '2020-03-05 11:38:34',
            ),
            6 => 
            array (
                'id' => 51,
            'titulo' => 'Galeria pag 15 (2)',
                'descripcion' => 'Galeria pag 15',
                'imagen' => 'imagenes/cap01-pag15-img02.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:40:06',
                'updated_at' => '2020-03-05 11:40:06',
            ),
            7 => 
            array (
                'id' => 52,
            'titulo' => 'Galeria pag 15 (3)',
                'descripcion' => 'Galeria pag 15',
                'imagen' => 'imagenes/cap01-pag15-img03.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:40:28',
                'updated_at' => '2020-03-05 11:40:28',
            ),
            8 => 
            array (
                'id' => 53,
                'titulo' => 'Galeria pag 19',
                'descripcion' => 'Galeria pag 19',
                'imagen' => 'imagenes/cap01-pag19-img01.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:43:20',
                'updated_at' => '2020-03-05 11:43:20',
            ),
            9 => 
            array (
                'id' => 54,
            'titulo' => 'Galeria pag 19 (2)',
                'descripcion' => 'Galeria pag 19',
                'imagen' => 'imagenes/cap01-pag19-img02.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:43:43',
                'updated_at' => '2020-03-05 11:43:43',
            ),
            10 => 
            array (
                'id' => 55,
            'titulo' => 'Galeria pag 19 (3)',
                'descripcion' => 'Galeria pag 19',
                'imagen' => 'imagenes/cap01-pag19-img03.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:44:10',
                'updated_at' => '2020-03-05 11:44:10',
            ),
            11 => 
            array (
                'id' => 56,
                'titulo' => 'Transparencia Fajardo',
                'descripcion' => 'Transparencia Fajardo',
                'imagen' => 'imagenes/cap01-pag14-img01.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:46:38',
                'updated_at' => '2020-03-05 11:46:38',
            ),
            12 => 
            array (
                'id' => 57,
            'titulo' => 'Transparencia Fajardo (2)',
                'descripcion' => 'Transparencia Fajardo',
                'imagen' => 'imagenes/cap01-pag14-img02.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:46:59',
                'updated_at' => '2020-03-05 11:46:59',
            ),
            13 => 
            array (
                'id' => 58,
            'titulo' => 'Transparencia Fajardo (3)',
                'descripcion' => 'Transparencia Fajardo',
                'imagen' => 'imagenes/cap01-pag14-img03.jpg',
                'capitulo_id' => 6,
                'created_at' => '2020-03-05 11:47:13',
                'updated_at' => '2020-03-05 11:47:13',
            ),
        ));
        
        
    }
}