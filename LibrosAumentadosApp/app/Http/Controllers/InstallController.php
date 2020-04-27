<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Artisan;
use DB;
use App\console\Commands;
use App\User;

class InstallController extends Controller
{
    public function index()
    {
        try{
            if (User::exists()){
                return redirect()->route('install.erase');
            }else {
                return view('install/formUserInstall');
            }
        }catch(Exception $e){
            return view('install/formInstall');
        }

    }

    public function createFile(Request $r){
        $host = $r->host;
        $appUrl = $r->appUrl;
        $dbConnection = $r->dbConnection;
        $dbPort = $r->dbPort;
        $namedb = $r->namedb;
        $userdb = $r->userdb;
        $passdb =$r->passdb;
        $backPath = storage_path('LibrosAumentadosApp.sql');

        $rand = random_bytes(32);
        $encode = base64_encode($rand);

        $env = ".env";

        $texto =
        "APP_NAME=Laravel
        APP_ENV=local
        APP_KEY=base64:" . $encode . "
        APP_DEBUG=true
        APP_URL=' . $appUrl . '
        
        LOG_CHANNEL=stack
        
        DB_CONNECTION=mysql
        DB_HOST=' . $host . '
        DB_PORT=' . $dbPort . '
        DB_DATABASE=' . $namedb . '
        DB_USERNAME=' . $userdb . '
        DB_PASSWORD=' . $passdb . '
        
        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        QUEUE_CONNECTION=sync
        SESSION_DRIVER=file
        SESSION_LIFETIME=120
        
        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379
        
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        
        AWS_ACCESS_KEY_ID=
        AWS_SECRET_ACCESS_KEY=
        AWS_DEFAULT_REGION=us-east-1
        AWS_BUCKET=
        
        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_APP_CLUSTER=mt1
        
        MIX_PUSHER_APP_KEY='${PUSHER_APP_KEY}'
        MIX_PUSHER_APP_CLUSTER='${PUSHER_APP_CLUSTER}'
        ";

        if($archivo = fopen($env, "w")){
            fwrite($archivo, $texto);
        }else {
            echo "Copiar archivo .env manualmente";
        }
        fclose($archivo);

        $old = public_path('.env');

        $new = "/.env";

        rename(".env", "../.env");

        return redirect()->route('install.migration');
    }

    public function migration()
    {
        Artisan::call('migrate');

        return redirect()->route('install.createUser');
    }

    public function createUser()
    {
        return view('install/formUserInstall');
    }

    public function storeUser(Request $r)
    {
        $user = new User();

        $r->validate([
            'password' => 'confirmed',
        ]);

        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = $r->password;

        $user->save();

        return redirect()->route('install.erase');
    }

    public function erase()
    {
        $vistas = "../resources/views/install";

        foreach(glob($vistas . "/*") as $file){
            unlink($file);
        }
        rmdir($vistas);

        $textoquesebusca = array("Route::get('install', 'InstallController@index')->name('install.index');",
        "Route::get('install/migration', 'InstallController@migration')->name('install.migration');",
        "Route::post('install/storeUser', 'InstallController@storeUser')->name('install.storeUser');",
        "Route::post('install/createFile', 'InstallController@createFile')->name('install.createFile');",
        "Route::get('install/createUser', 'InstallController@createUser')->name('install.createUser');",
        "Route::get('install/erase', 'InstallController@erase')->name('install.erase');");

        $web = '../routes/web.php';

        $data = file_get_contents($web);

        $datosnuevos = str_replace($textoquesebusca, '', $data);

        file_put_contents($web, $datosnuevos);

        $controlador = "../app/Http/Controllers/InstallController.php";
        unlink($controlador);

        return redirect()->route('libro');
    }
    public function checkData(Request $r)
    {
        
    }
}
