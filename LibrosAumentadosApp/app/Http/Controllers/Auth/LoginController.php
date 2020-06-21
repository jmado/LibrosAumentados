<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Libro;
use App\Capitulo;
use App\User;
use App\Http\Controllers\LibrosController;

use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/index';

    protected $redirectAfterLogout = '/libros'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout() {
        Auth::logout();
        return redirect('/libro');
    }
/*
    public function login(Request $r)
    {
        $email = $r->email;
        $passwordEncriptada = password_hash($r->login, PASSWORD_DEFAULT);
        $userOk = User::checkLogin($email, $r->login);
        if ($userOk) {
            $libroList = Libro::all();
            return view('libro.all', compact('libroList'));
        } else {
            $data['mensajeError'] = "Nombre de usuario o contraseña incorrectos";
            return view('auth.login', $data);
        }

    }
    */
}
