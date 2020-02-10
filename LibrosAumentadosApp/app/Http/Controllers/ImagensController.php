<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imagen;
use App\Galeria;
use App\Capitulo;

use App\Galeria_imagen;

class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        //$datos = DB::select('select * from imagens where capitulo_id=:id',['id'=>$id])->simplePaginate(3);
        $datos = Imagen::where('capitulo_id', '=', $id)->simplePaginate(3);
        return view('imagen.all', compact('datos', 'id'));
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
        $archivo = $request->file;
        $archivo->move('imagenes', $archivo->getClientOriginalName());
        $datos->imagen = "imagenes/".$archivo->getClientOriginalName();
        //Capitulo al que pertenece
        $datos->capitulo_id = $request->capitulo_id;
        //Guardo
        $datos->save();

        //Galeria a la que puede pertenecer ¿?
        $id = DB::select('select max(id) as "id" from imagens');
        $imagen_id = $id[0]->id;
        $galeria_id = $request->galeria_id;
        $datos->galerias()->sync($galeria_id);
        
        $id = $request->capitulo_id;
        return redirect()->route('imagen.all', $id);
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
        $capitulos = DB::table('capitulos')->select('id','titulo')->get();
        //Listado de galerias  
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
        //Capitulo al que pertenece
        $datos->capitulo_id = $request->capitulo_id;
        $archivo = $request->file;
       //Imagen
        if($archivo != null){
            $archivo->move('imagenes', $archivo->getClientOriginalName());
            $datos->imagen = "imagenes/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();

        //Enlazo la posible galeria relacionada con la imagen
        $imagen_id = $datos->id;
        $galeria_id = $request->galeria_id;

        //Sincronizo los campos relacionados entre galerias e imagenes de forma automatica Laravel te quiero
        $datos->galerias()->sync($galeria_id);
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
        $id_capitulo = $datos->capitulo_id;
        unlink($datos->imagen);
        $datos->delete();
        return redirect()->route('imagen.all', $id_capitulo);
    }
}
