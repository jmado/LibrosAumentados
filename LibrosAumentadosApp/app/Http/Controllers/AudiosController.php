<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Audio;
use App\Capitulo;

class AudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($capitulo_id)
    {

        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$capitulo_id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $capitulo_id);

        $datos = Audio::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);

        return view('audio.all', compact('datos', 'capitulo_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulo_id = Session::get('capitulo_id');
        return view('audio.form', compact('capitulo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = new Audio;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        //Audio
        $archivo = $request->file;
        //Lo muevo a la carpeta
        $archivo->move('audios', $archivo->getClientOriginalName());
        //Lo guardo en la base de datos
        $datos->archivo ="audios/" .$archivo->getClientOriginalName();

        $id = Session::get('capitulo_id');
        $datos->capitulo_id = $id;
        
        $datos->save();
        
        return redirect()->route('audio.all', $id);
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
        $datos = Audio::findOrFail($id);
        //Capitulos
        $capitulo_id = Session::get('capitulo_id');
        return view('audio.form', compact('datos','capitulo_id'));
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
        $datos = Audio::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $capitulo_id = Session::get('capitulo_id');
        $datos->capitulo_id = $capitulo_id;

        

        //Audio
        $archivo = $request->file;
        if($archivo != null){
            $archivo->move('audios', $archivo->getClientOriginalName());
            $datos->imagen = "audios/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();

        return redirect()->route('audio.all', $capitulo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Audio::findOrFail($id);
        $id_capitulo = $datos->capitulo_id;
        unlink($datos->archivo);
        $datos->delete();
        return redirect()->route('audio.all', $id_capitulo);
    }
}
