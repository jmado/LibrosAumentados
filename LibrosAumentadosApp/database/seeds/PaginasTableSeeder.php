<?php

use Illuminate\Database\Seeder;

class PaginasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Libro 1
        DB::table('paginas')->insert([
            'numero_pagina' => 1,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 1,
        ]);
        DB::table('paginas')->insert([
            'numero_pagina' => 2,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 1,
        ]);
        //Libro 2
        DB::table('paginas')->insert([
            'numero_pagina' => 3,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 2,
        ]);
        DB::table('paginas')->insert([
            'numero_pagina' => 4,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 2,
        ]);
        DB::table('paginas')->insert([
            'numero_pagina' => 5,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 2,
        ]);
        //Libro 3
        DB::table('paginas')->insert([
            'numero_pagina' => 6,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 3,
        ]);
    }
}
