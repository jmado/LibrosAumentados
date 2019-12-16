<?php

use Illuminate\Database\Seeder;

class GaleriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galerias')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'tipo' => 'normal',
            'capitulo_id' => 1,
        ]);
        DB::table('galerias')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'tipo' => 'normal',
            'capitulo_id' => 2,
        ]);
        DB::table('galerias')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'tipo' => 'transparencia',
            'capitulo_id' => 3,
        ]);
        DB::table('galerias')->insert([
            'titulo' => Str::random(8),
            'descripcion' => Str::random(8),
            'tipo' => 'transparencia',
            'capitulo_id' => 4,
        ]);
    }
}
