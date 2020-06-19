<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Capitulo;
use App\Libro;

class CapitulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($libro_id)
    {
        $capituloList = Capitulo::where('libro_id', '=', $libro_id)->orderBy('numero_orden')->simplePaginate(8);
        $id = $libro_id;
        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        $libro = Libro::find($libro_id);
        return view('capitulo.all', compact('libro','capituloList', 'id'));
    }
    public function adminIndex($libro_id)
    {
        $libro = Libro::find($libro_id);
        $capitulos = Capitulo::where('libro_id', '=', $libro_id)->orderBy('numero_orden')->simplePaginate(8);
        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        return view('capitulo.capituloAll', compact('libro','capitulos', 'libro_id'));
    }
    public function admin()
    {
        $capitulos = DB::select("
        select libros.titulo as libro, capitulos.numero_orden, capitulos.titulo, capitulos.id
        from capitulos
        inner join libros on capitulos.libro_id = libros.id
        ");
        
        return view('capitulo.all', compact('capitulos'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = Libro::find(Session::get('libro_id'));
        return view('capitulo.formTable', compact('libro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
       

        $cap = new Capitulo($r->all());
        $cap->numero_orden = $r->numero_orden;
        $cap->titulo = $r->titulo;


        $cap->capitulo_padre_id = ($r->numero_orden == 1)? '0' : ($r->numero_orden-1);

        $libro_id = Session::get('libro_id');;
        $cap->libro_id = $libro_id;
        
        if(isset($r->libro_id) && $r->libro_id!=null){
            $cap->libro_id = $r->libro_id;
            $cap->save();
            return redirect()->route('capitulo.admin');
        }else{
            $capitulo_id = Session::get('libro_id');
            $cap->libro_id = $libro_id;
            $cap->save();
            return redirect()->route('libro.capitulos', $libro_id);
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
        return view('capitulo.all');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Capitulo::find($id);
        
        $libro = Libro::find($datos->libro_id);
        return view('capitulo.formTable', compact('datos', 'libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $cap = Capitulo::find($id);
        $cap->numero_orden = $r->numero_orden;
        $cap->titulo = $r->titulo;
        $cap->capitulo_padre_id = ($r->numero_orden == 1)? '0' : ($r->numero_orden-1);

        $libro_id = Session::get('libro_id');
        $cap->libro_id = $libro_id;

        $cap->save();

        return redirect()->route('libro.capitulos', $libro_id);
    }
    public function updateAdmin(Request $r, $id)
    {
        $cap = Capitulo::find($id);
        $cap->numero_orden = $r->numero_orden;
        $cap->titulo = $r->titulo;
        $cap->capitulo_padre_id = ($r->numero_orden == 1)? '0' : ($r->numero_orden-1);

        $libro_id = Session::get('libro_id');
        $cap->libro_id = $libro_id;

        $cap->save();

        return redirect()->route('capitulo.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cap = Capitulo::find($id);
        $libro_id = $cap->libro_id;
        $cap->delete();
        return redirect()->route('libro.capitulos', $libro_id);
        
    }
    public function deleteAdmin($id)
    {
        $cap = Capitulo::find($id);
        $id_libro = $cap->libro_id;
        $cap->delete();

        return redirect()->route('capitulo.admin');
    }

     /**
     * Comprueba si el libro tiene contenido
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteConfirm($id){
        $contador = 0;
        $contenido = DB::select('select id from imagens where capitulo_id=:id',['id'=>$id]);
        $contador += count($contenido);
        $contenido = DB::select('select id from galerias where capitulo_id=:id',['id'=>$id]);
        $contador += count($contenido);
        $contenido = DB::select('select id from audio where capitulo_id=:id',['id'=>$id]);
        $contador += count($contenido);
        $contenido = DB::select('select id from videos where capitulo_id=:id',['id'=>$id]);
        $contador += count($contenido);
        $contenido = DB::select('select id from modelo_3ds where capitulo_id=:id',['id'=>$id]);
        $contador += count($contenido);
        $contenido = DB::select('select id from descargas where capitulo_id=:id',['id'=>$id]);
        $contador += count($contenido);
        
        if($contador == 0){
            return redirect()->route('capitulo.delete', $id);
        }
        else{
            $id = Session::get('libro_id');
            return redirect()->route('capitulo.all', $id);
           
        }
    }




    /*
    *   Mostrar todo los tipos de contenido de los capitulos
    *
    */
    public function contenido($id){
        $cap = Capitulo::find($id);
        $id_libro = $cap->libro_id;
        /*
        $paginas;
        $imagenes;
        $galerias;
        $videos;
        $audio;
        $modelos3d;
        $archivos;
        */
        //return redirect()->route('capitulo.contenido', $id);
        return view('capitulo.contenido', compact('id', 'id_libro'));

    }




    //Backend CRUD Administrador ******************************************************************************************************************

/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Capitulo::findOrFail($id);
        return view('capitulo.formTable', compact('datos'));
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
        return view('capitulo.formTable', compact('libros'));
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
        //Elemento
        $datos = Capitulo::findOrFail($id);
        return view('capitulo.formTable', compact('datos', 'libros'));
    }
}
