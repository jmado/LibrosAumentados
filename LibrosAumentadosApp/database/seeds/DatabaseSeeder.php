<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LibrosTableSeeder::class);
        $this->call(CapitulosTableSeeder::class);
        $this->call(PaginasTableSeeder::class);

        $this->call(ImagensTableSeeder::class);
        $this->call(GaleriasTableSeeder::class);
        $this->call(Galerias_imagensTableSeeder::class);

        
        $this->call(VideosTableSeeder::class);
        $this->call(DescargasTableSeeder::class);
        $this->call(Modelo_3dsTableSeeder::class);
        $this->call(AudiosTableSeeder::class);
        $this->call(GaleriaImagenTableSeeder::class);
    }
}
