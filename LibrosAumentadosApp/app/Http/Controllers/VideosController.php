<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Video;
use App\Capitulo;

class VideosController extends Controller
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

        $datos = Video::where('capitulo_id', '=', $capitulo_id)->simplePaginate(3);
        return view('video.all', compact('datos', 'capitulo_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $capitulos = Session::get('capitulo_id');
        return view('video.form', compact('capitulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = new Video;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $datos->video = $request->video;
        $id =Session::get('capitulo_id');
        $datos->capitulo_id = $id;
        
        $datos->save();
        
        return redirect()->route('video.all', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Video::findOrFail($id);
        $url = $datos->video;
        $videoNumero = substr($url, 18);
        //dd($videoNumero);
        return view('video.show', compact('datos', 'videoNumero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Video::findOrFail($id);
        //Listado de capitulos 
        $capitulos = Session::get('capitulo_id');
        return view('video.form', compact('datos', 'capitulos'));
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
        $datos = Video::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $datos->capitulo_id = Session::get('capitulo_id');
        $datos->video = $request->video;
        $datos->save();
        return redirect()->route('video.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Video::findOrFail($id);
        $capitulo_id = Session::get('capitulo_id');
        $datos->delete();
        return redirect()->route('video.all', $capitulo_id);
    }
}
