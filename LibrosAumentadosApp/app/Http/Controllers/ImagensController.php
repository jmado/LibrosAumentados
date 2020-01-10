<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imagen;
use App\Galeria;
use App\Capitulo;

class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Imagen::all();
        return view('imagen.all', compact('datos'));
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
        $datos = new Imagen;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        //Archivo
        $archivo = $request->imagen;
        $archivo->move('imagenes', $archivo->getClientOriginalName());
        $datos->imagen = "imagenes/".$archivo->getClientOriginalName();

        //Capitulo al que pertenece
        $datos->capitulo_id = $request->capitulo_id;

        //SAVE
        $datos->save();

        //Galeria a la que puede pertenecer ¿?
        $imagen_id = DB::select('select max(id) as "id" from imagens');
        $id = $imagen_id[0]->id;
        DB::insert('insert into galeria_imagen (galeria_id, imagen_id) values (?, ?)',[$request->galeria_id, $id]);
        

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
        $datos = Imagen::findOrFail($id);
        return view('imagen.show', compact('datos'));
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
        //Listado de capitulos 
        //$capitulos = DB::select('select capitulos.id, capitulos.titulo from capitulos');
        $capitulos = DB::table('capitulos')->select('id','titulo')->get();
        //Listado de galerias 
        //$galerias = DB::select('select galerias.id, galerias.titulo from galerias');
        $galerias = DB::table('galerias')->select('id','titulo')->get();
        return view('imagen.form', compact('datos','capitulos','galerias'));
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
        $datos = Imagen::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $datos->capitulo_id = $request->capitulo_id;
        $archivo = $request->imagen;
        if($archivo != null){
            $datos->imagen = "imagenes/" . $archivo->getClientOriginalName();
            $request->imagen->move(base_path('imagenes'), $archivo->getClientOriginalName());
        }
        $datos->save();
        return redirect()->route('imagen.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Imagen::findOrFail($id);
        $datos->delete();
        return redirect()->route('imagen.index');
    }
}
