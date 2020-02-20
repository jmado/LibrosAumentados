<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Descarga;
use App\Capitulo;

class DescargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($capitulo_id)
    {
        $datos = Descarga::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);
        return view('descarga.all', compact('datos', 'capitulo_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulos = DB::select('select id, titulo from capitulos');
        return view('descarga.form', compact('capitulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = new Descarga;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        //Archivo
        $datos->tipo_archivo = $request->tipo_archivo;
        $archivo = $request->file;
        //Lo muevo a la carpeta
        $archivo->move('descargas', $archivo->getClientOriginalName());
        //Lo guardo en la base de datos
        $datos->archivo ="descargas/" .$archivo->getClientOriginalName();

        $datos->capitulo_id = $request->capitulo_id;
        $id = $request->capitulo_id;
        $datos->save();
        
        return redirect()->route('descarga.all', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Descarga::findOrFail($id);
        return view('descarga.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Descarga::findOrFail($id);
        //Capitulos
        $capitulos = DB::table('capitulos')->select('id','titulo')->get();
        return view('descarga.form', compact('datos','capitulos'));
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
        $datos = Descarga::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $datos->capitulo_id = $request->capitulo_id;
        $datos->tipo_archivo = $request->tipo_archivo;

        $capitulo_id = $request->capitulo_id;

        //Audio
        $archivo = $request->file;
        if($archivo != null){
            $archivo->move('descargas', $archivo->getClientOriginalName());
            $datos->imagen = "descargas/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();

        return redirect()->route('descarga.all', $capitulo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Descarga::findOrFail($id);
        $id_capitulo = $datos->capitulo_id;
        unlink($datos->archivo);
        $datos->delete();
        return redirect()->route('descarga.all', $id_capitulo);
    }
}
