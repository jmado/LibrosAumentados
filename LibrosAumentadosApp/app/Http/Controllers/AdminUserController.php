<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //$user = new User($r->all());
        /*$user = new User;
        $user->name = $r->name;
        $user->email = $r->email;
        $user->email_verified_at = $r->email_verified_at;
        $user->password = $r->password;*/

        $users = User::all();

        User::create($r->all());

       // dd($user);
        //$user->save();

        return redirect()->route('admin.user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        /*return view('admin.user.update', compact('user'));*/
        return view('admin.users.edit', compact('user'));
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
        /*$user = new User;
        $user->name = $r->name;
        $user->email = $r->email;
        $user->email_verified_at = $r->email_verified_at;
        $user->password = $r->password;

        
        //$user->fill($r->all());
      
        $user->save();*/

        $user = User::find($id);

        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = $r->password;

        return redirect()->route('admin.user.edit');
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

        return redirect()->route('admin.user.index', $user->id);
    }
}
