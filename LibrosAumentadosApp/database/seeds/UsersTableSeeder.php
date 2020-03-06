<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 15,
                'name' => 'a',
                'email' => 'a@a.a',
                'email_verified_at' => NULL,
                'password' => '$2y$10$dOn/384cHUHX6.rufUz4ke1uDnzF7Il1.QtLBjRa.EeVyJmDowPSa',
                'remember_token' => NULL,
                'created_at' => '2020-02-19 11:45:06',
                'updated_at' => '2020-02-19 11:45:06',
            ),
        ));
        
        
    }
}