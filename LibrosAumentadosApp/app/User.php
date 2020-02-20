<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public static function checkLogin($email, $password) {
        //$result = DB::raw("SELECT * FROM users WHERE email ='$email' and password = '$passwordEncriptada'");
        $result = DB::table('users')->select('password')->where([
            ['email', '=', $email]
        ])->get();
        if ($result->isEmpty()) return false;
        if (password_verify($password, $result[0]->password))
            return true;
        else
            return false;
    }*/
}
