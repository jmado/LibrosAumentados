<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imagen;
use App\Galeria;
use App\Capitulo;

use App\Galeria_imagen;

class GaleriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias = Galeria::all();
        return view('galeria.all', compact('galerias'));
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
        $imagenes = DB::select('select id, imagen from imagens');
        return view('galeria.form', compact('capitulos','imagenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creo una galeria
        $datos = new Galeria;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        //Archivo
        

        //Capitulo al que pertenece
        

        //Guardo
        $datos->save();

        //Imagenes que tiene
        

        return redirect()->route('galeria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Datos de la galeria
        //$galeria = DB::table('galerias')->where('id',$id)->get();
        $galeria = DB::select('select * from galerias where id=:id',['id'=>$id]);
        //Imagenes
        $imagenes=DB::select('select imagens.id, imagens.titulo, imagens.imagen 
                            from imagens 
                            inner join galeria_imagen on imagens.id=galeria_imagen.imagen_id 
                            where galeria_imagen.galeria_id=:id', ['id'=>$id]);
        return view('galeria.galeria', compact('galeria','imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
