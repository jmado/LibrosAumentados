<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imagen;
use App\Galeria;

class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::all();
        return view('imagen.all', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Listado de capitulos existentes
        $capitulos = DB::select('select id, titulo from capitulos');
        //Listado de galerias existentes
        $galerias = DB::select('select id, titulo from galerias');
        return view('imagen.form', compact('capitulos','galerias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = new Imagen;
        $imagen->titulo = $request->titulo;
        $imagen->descripcion = $request->descripcion;

        //Archivo
        $archivo = $request->imagen;
        $archivoNombre = $archivo->getClientOriginalName();
        $archivo->move('imagenes', $archivoNombre);
        $imagen->imagen = "imagenes/".$archivoNombre;

        //Capitulo al que pertenece
        $imagen->capitulo_id = $request->capitulo_id;
        /*Galeria a la que puede pertenecer ¿?
        $imagen_id;
        DB::insert('insert into galeria_imagen ("galeria_id", "imagen_id") values ("$request->galeria_id", "$imagen_id")');
        */

        //SAVE
        $imagen->save();
        return redirect()->route('imagen.index');
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
        $datos = Imagen::findOrFail($id);
        return view('imagen.form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
