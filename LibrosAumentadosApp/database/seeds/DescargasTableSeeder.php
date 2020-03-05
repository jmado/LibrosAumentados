<?php

use Illuminate\Database\Seeder;

class DescargasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('descargas')->delete();
        
        
        
    }
}