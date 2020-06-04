<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Audio;
use App\Capitulo;
use App\Libro;

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

        //$datos = Audio::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);
        //$datos = Audio::where('capitulo_id', '=', $capitulo_id);
        $datos = DB::select('Select * from audio where capitulo_id=:id', ['id'=>$capitulo_id]);
        

        
        $libro = Libro::find($libro_id);
        return view('audio.all', compact('libro','datos', 'libro_id'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulo_id = Session::get('capitulo_id');
        return view('audio.formTable', compact('capitulo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['file'=>'required']);
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'file' => 'required|mimetypes:audio/mpeg'
        ]);


        $datos = new Audio;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        //Audio
        $archivo = $request->file;
        //Lo muevo a la carpeta
        $archivo->move('audios', $archivo->getClientOriginalName());
        //Lo guardo en la base de datos
        $datos->archivo ="audios/" .$archivo->getClientOriginalName();

        


        if(isset($request->capitulo_id) && $request->capitulo_id!=null){
            $datos->capitulo_id = $request->capitulo_id;
            $datos->save();
            return redirect()->route('audio.admin');
        }else{
            $capitulo_id = Session::get('capitulo_id');
            $datos->capitulo_id = $capitulo_id;
            $datos->save();
            return redirect()->route('libro.audios', $capitulo_id);
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
        $capitulo = Capitulo::findOrFail($datos->capitulo_id);
        //libro
        $libro = Libro::findOrFail($capitulo->libro_id);
        return view('audio.formTable', compact('datos', 'capitulo', 'libro'));
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
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'file' => 'mimetypes:audio/mpeg'
        ]);

        $datos = Audio::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $capitulo_id = Session::get('capitulo_id');
        $datos->capitulo_id = $capitulo_id;

        

        //Audio
        $archivo = $request->file;
        if($archivo != null){
            $archivo->move('audios', $archivo->getClientOriginalName());
            $datos->archivo = "audios/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();
        return redirect()->route('libro.audios', $capitulo_id);
        
    }
    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'file' => 'mimetypes:audio/mpeg'
        ]);

        $datos = Audio::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        $capitulo_id = Session::get('capitulo_id');
        $datos->capitulo_id = $capitulo_id;

        

        //Audio
        $archivo = $request->file;
        if($archivo != null){
            $archivo->move('audios', $archivo->getClientOriginalName());
            $datos->archivo = "audios/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();
        return redirect()->route('audio.admin', $capitulo_id);
        
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
        return redirect()->route('libro.audios', $id_capitulo);
    }
    public function deleteAdmin($id)
    {
        $datos = Audio::findOrFail($id);
        $id_capitulo = $datos->capitulo_id;
        unlink($datos->archivo);
        $datos->delete();
        return redirect()->route('audio.admin', 'id_capitulo');
    }









//Backend CRUD Administrador ******************************************************************************************************************
    public function adminIndex($capitulo_id)
    {
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$capitulo_id]);
        $libro_id = $libro_id[0]->libro_id;
        $libro = Libro::find($libro_id);
        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $capitulo_id);

        //$datos = Audio::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);
        $capitulo = Capitulo::find($capitulo_id);
        $datos = DB::select('Select * from audio where capitulo_id=:id', ['id'=>$capitulo_id]);

        return view('audio.audioAll', compact('libro', 'capitulo', 'datos', 'libro_id'));
    }
    public function admin()
    {
        $audios = $consulta = DB::select("select * from audio");
        return view('audio.all', compact('audios'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Audio::findOrFail($id);
        return view('audio.showTable', compact('datos'));
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
       //Libros
       $libros = DB::select("select * from libros");
       //Capitulos
       $capitulos = DB::select("select * from capitulos");
        return view('audio.formTable', compact('libros', 'capitulos'));
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
        $datos = Audio::findOrFail($id);
        
        return view('audio.formTable', compact('datos','libros', 'capitulos'));
    }













}
