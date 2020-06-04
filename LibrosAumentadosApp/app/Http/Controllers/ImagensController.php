<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
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
        $datos = Imagen::where('capitulo_id', '=', $id)->simplePaginate(8);
        
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);
        
        $libro = Libro::find($libro_id);

        return view('imagen.all', compact('libro', 'datos', 'libro_id'));
    }
    


    public function buscador(Request $request)
    {
        
        $capitulo_id = Session::get('capitulo_id');

        $search = $request->search;
        if(!empty($search)){
            $query="select * from imagens where (titulo like '%$search%') and (capitulo_id='$capitulo_id') order by titulo";
            $result =  DB::select($query);
            
        
           
            $jsonstring = json_encode($result);
            echo $jsonstring;
        }
        
            
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Capitulo
        $capitulo = Capitulo::find(Session::get('capitulo_id'));
        $libro = Libro::find($capitulo->id);
        
        //Listado de galerias existentes
        //$galerias = DB::select('select id, titulo from galerias where capitulo_id=:id',['id'=>$capitulo_id]);

        return view('imagen.formTable', compact('capitulo', 'libro'));
    }
    public function createAdmin()
    {
        //Libros
        $libros = DB::select("select * from libros");
        //Capitulos
        $capitulos = DB::select("select * from capitulos");
        return view('imagen.formTable', compact('libros', 'capitulos'));
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
            'file' => 'required|mimes:jpeg,png'
        ]);
        

        

        $datos = new Imagen;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;
        //Archivo
        $archivo = $request->file;
        $archivo->move('imagenes', $archivo->getClientOriginalName());
        $datos->imagen = "imagenes/".$archivo->getClientOriginalName();
        

        if(isset($request->capitulo_id) && $request->capitulo_id!=null){
            $datos->capitulo_id = $request->capitulo_id;
            $datos->save();
            return redirect()->route('imagen.admin');
        }else{
            $capitulo_id = Session::get('capitulo_id');
            $datos->capitulo_id = $capitulo_id;
            $datos->save();
            return redirect()->route('libro.imagenes', $capitulo_id);
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
        $capitulo = Capitulo::findOrFail($datos->capitulo_id);
        $libro = Libro::findOrFail($capitulo->libro_id);
        //Listado de galerias  
        //$galerias = DB::table('galerias')->select('id','titulo')->where('capitulo_id', '=', $capitulo_id)->get();
       
       $galerias=DB::select('select galerias.id, galerias.titulo 
        from galerias 
        inner join galeria_imagen on galerias.id = galeria_imagen.galeria_id
        where galeria_imagen.imagen_id=:id',['id'=>$id]);

        
        return view('imagen.formTable', compact('datos', 'capitulo', 'galerias', 'libro'));
        //return view('imagen.formAdmin', compact('datos','capitulo_id','galerias'));
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
            'file' => 'mimes:jpeg,png'
        ]);


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

       
        $id = Session::get('capitulo_id');
        return redirect()->route('libro.imagenes', $id);
    }
    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'file' => 'mimes:jpeg,png'
        ]);


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

       
        $id = Session::get('capitulo_id');
        return redirect()->route('imagen.admin', $id);
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
        return redirect()->route('libro.imagenes', $id);
    }
    public function deleteAdmin($id)
    {
        $datos = Imagen::findOrFail($id);
        $id_capitulo = $datos->capitulo_id;
    
        $datos->delete();

        
        $id = Session::get('capitulo_id');
        return redirect()->route('imagen.admin', $id);
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







//Backend CRUD Administrador ******************************************************************************************************************
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex($id)
    {
        //Consulta todas las imagenes de ese capitulo
        $datos = Imagen::where('capitulo_id', '=', $id)->simplePaginate(8);
        
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;

        $capitulo = Capitulo::find($id);
        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);
        
        $libro = Libro::find($libro_id);

        return view('imagen.imagenAll', compact('libro', 'capitulo', 'datos', 'libro_id'));
    }
    public function admin()
    {
        $imagenes = $consulta = DB::select("select * from imagens");
        
        return view('imagen.all', compact('imagenes'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Imagen::findOrFail($id);
        return view('imagen.showTable', compact('datos'));
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
        $datos = Imagen::findOrFail($id);
        return view('imagen.formTable', compact('datos', 'libros', 'capitulos'));
    }






}
