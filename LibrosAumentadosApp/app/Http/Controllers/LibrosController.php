<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Libro;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libroList = Libro::all();
        return view('libro.all', compact('libroList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $lib = new Libro($r->all());
        $file = $r->file('cubierta');
        if ($file != null) {
            $lib->cubierta = "/imagenes/".$file->getClientOriginalName();
            $r->cubierta->move(base_path('public/imagenes'), $file->getClientOriginalName());
        } else {
            $lib->cubierta = 'sin-cubierta';
        }

        $lib->save();

        return redirect()->route('libro.index');
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
        $libro = Libro::find($id);
        return view('libro.form', ["libro" => $libro] );
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
        $lib = Libro::find($id);

        $lib->fill($r->all());
        $file = $r->file('cubierta');
        
        if ($file != null) {
            $lib->cubierta = "/imagenes/".$file->getClientOriginalName(); 
            $r->cubierta->move(base_path('public/imagenes'), $file->getClientOriginalName());
        }

        $lib->save();

        return redirect()->route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lib = Libro::find($id);
        $lib->delete();
        
        return redirect()->route('libro.index');
    }
}
