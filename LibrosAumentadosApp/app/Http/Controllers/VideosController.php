<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Video;
use App\Capitulo;
use App\Libro;

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

        $datos = Video::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);

        $libro = Libro::findOrFail($libro_id);
        return view('video.all', compact('libro','datos', 'libro_id'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $capitulo = Capitulo::findOrFail(Session::get('capitulo_id'));
        $libro = Libro::findOrFail($capitulo->libro_id);
        return view('video.formTable', compact('capitulo', 'libro'));
    }
    public function createAdmin()
    {
        //Libros
        $libros = DB::select("select * from libros");
        //Capitulos
        $capitulos = DB::select("select * from capitulos");
        return view('video.formTable', compact('libros', 'capitulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['video'=>'required']);
        
        $datos = new Video;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $url = $request->video;
        $videoNumero = substr($url, 18);
        $datos->video = $videoNumero;
        $id =Session::get('capitulo_id');
        $datos->capitulo_id = $id;
        
        

        if(isset($request->capitulo_id) && $request->capitulo_id!=null){
            $datos->capitulo_id = $request->capitulo_id;
            $datos->save();
            return redirect()->route('video.admin');
        }else{
            $capitulo_id = Session::get('capitulo_id');
            $datos->capitulo_id = $capitulo_id;
            $datos->save();
            return redirect()->route('libro.videos', $capitulo_id);
        }
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
        
        //dd($videoNumero);
        return view('video.show', compact('datos'));
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
        $capitulo = Capitulo::findOrFail($datos->capitulo_id);
        $libro = Libro::findOrFail($capitulo->libro_id);
        return view('video.formTable', compact('datos', 'capitulo', 'libro'));
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
        //$datos->video = $request->video;
        if(isset($request->video) && ($request->video!=null)){
            $url = $request->video;
            $videoNumero = substr($url, 18);
            $datos->video = $videoNumero;
        }
        

        $capitulo_id = $datos->capitulo_id;
        $datos->save();
        return redirect()->route('libro.videos', $capitulo_id);
    }

    public function updateAdmin(Request $request, $id)
    {
        $datos = Video::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $datos->capitulo_id = Session::get('capitulo_id');
        $datos->video = $request->video;
        $capitulo_id = $datos->capitulo_id;
        $datos->save();
        return redirect()->route('video.admin', $capitulo_id);
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
        $id = Session::get('capitulo_id');
        return redirect()->route('libro.videos', $id);
    }
    public function deleteAdmin($id)
    {
        $datos = Video::findOrFail($id);
        $capitulo_id = Session::get('capitulo_id');
        $datos->delete();
        $id = Session::get('capitulo_id');
        return redirect()->route('video.admin', $id);
    }








//Backend CRUD Administrador ******************************************************************************************************************
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex($capitulo_id)
    {
        

        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$capitulo_id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $capitulo_id);

        $libro = Libro::findOrFail($libro_id);
        $capitulo = Capitulo::findOrFail($capitulo_id);

        //$datos = Video::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);
        $datos = DB::select('Select * from videos where capitulo_id=:id', ['id'=>$capitulo_id]);

        return view('video.videoAll', compact('libro','capitulo', 'datos', 'libro_id'));
    }
    public function admin()
    {
        $videos = $consulta = DB::select("
        select capitulos.titulo as capitulo, videos.titulo, videos.descripcion, videos.video, videos.id 
        from videos 
        inner join capitulos on videos.capitulo_id = capitulos.id");
        
        return view('video.all', compact('videos'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Video::findOrFail($id);
        return view('video.showTable', compact('datos'));
    }

//Admin tablas
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        //Libros
        $libros = DB::select("select * from libros");
        //Capitulos
        $capitulos = DB::select("select * from capitulos");
        //Elemento $id
        $datos = Video::findOrFail($id);
        return view('video.formTable', compact('datos', 'libros', 'capitulos'));
    }






}
