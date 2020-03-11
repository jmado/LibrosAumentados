<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Imagen;
use App\Galeria;
use App\Capitulo;
use App\Libro;

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
        //Consulta todas las imagenes de ese capitulo
        $datos = Imagen::where('capitulo_id', '=', $id)->simplePaginate(3);
        
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);
        
        $libro = Libro::find($libro_id);

        return view('imagen.all', compact('libro', 'datos', 'libro_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Capitulo
        $capitulo_id = Session::get('capitulo_id');

        //Listado de galerias existentes
        //$galerias = DB::select('select id, titulo from galerias where capitulo_id=:id',['id'=>$capitulo_id]);

        return view('imagen.form', compact('capitulo_id'));
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
        $id = Session::get('capitulo_id');
        $datos->capitulo_id = $id;
        //Guardo
        $datos->save();

        
        
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
        return view('imagen.all', compact('datos'));
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
        $capitulo_id = Session::get('capitulo_id');
        //Listado de galerias  
        $galerias = DB::table('galerias')->select('id','titulo')->where('capitulo_id', '=', $capitulo_id)->get();
        return view('imagen.form', compact('datos','capitulo_id','galerias'));
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
        $datos->capitulo_id = Session::get('capitulo_id');

        $archivo = $request->file;
       //Imagen
        if($archivo != null){
            $archivo->move('imagenes', $archivo->getClientOriginalName());
            $datos->imagen = "imagenes/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();

       
        $id = Session::get('libro_id');

        return redirect()->route('imagen.all', $id);
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
        


        /*Borrar fichero
        $consulta = DB::select("select count(imagen_id) as cantidad from galeria_imagen where imagen_id=:id", ['id'=>$id]);
        $consulta = $consulta[0]->cantidad;
        echo($consulta);
        if($consulta == 0) {
            unlink($datos->imagen);
        }
        */
        
        $datos->delete();

        
        $id = Session::get('capitulo_id');
        return redirect()->route('imagen.all', $id);
    }


    /**
     * Comprueba si el libro tiene contenido
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteConfirm($id){
        $galerias = DB::select('select id from galeria_imagen where imagen_id=:id',['id'=>$id]);
        
        if(count($galerias) == 0){
            return redirect()->route('imagen.delete', $id);
        }
        else{
            $id = Session::get('capitulo_id');
            return redirect()->route('imagen.all', $id);
           
        }
    }
}
