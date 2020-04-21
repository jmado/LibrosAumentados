<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LibrosAumentadosAppInstaller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LibrosAumentadosApp:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Let\'s install LibrosAumentadosApp!');
        $this->line(' ');
 
        $this->call('config:cache');
 
        $this->info("Database configuration...");
        $dbName = $this->ask('Introduce el nombre de la BBDD:');
        $dbUser = $this->ask('Introduce el usuario de la BBDD:', 'root');
        $dbPassword = $this->ask('Introduce la contraseña:', false);
        if($dbPassword == false) {
            $dbPassword = '';
        }

        $env_update = $this->changeEnv([
            'DB_DATABASE'   => $dbName,
            'DB_USERNAME'   => $dbUser,
            'DB_PASSWORD'   => $dbPassword
        ]);


        /*Ejecuto este comando suponiendo que al copiar el código fuente en el servidor, se copiaran también las migraciones de las tablas*/
        Artisan::call('php artisan migrate:refresh')


    }
}
