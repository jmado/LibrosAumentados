<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        return view('users.formTable');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {    
        //$users = User::all();
        $users = new User;
        //User::create($r->all());

        $users->name = $r->name;
        $users->email = $r->email;
        $users['password'] = bcrypt($r->password);

        $users->save();

        return redirect()->route('user.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = User::find($id);
        return view('users.formTable', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {

        $user = User::find($id);

        //Se guarda la contraseña antigua en una varible para que en el caso de que no se edite el campo contraseña
        //tenerla almacenada para que esta no cambie
        $pass = $user->password;
        
        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = $r->password;
        
        //Si el campo contraseña se deja vacio en el formulario esta será la misma de antes, 
        //almacenada en la variable $pass, en caso contrario, se encripta la nueva contraseña y se envia a la BBDD 
        //con el resto de datos
        if(empty($r->password)){
            $user->password = $pass;
        }else{
            $user['password'] = bcrypt($r->password);
        }

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
