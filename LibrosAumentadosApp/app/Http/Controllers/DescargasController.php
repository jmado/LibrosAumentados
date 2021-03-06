<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Descarga;
use App\Capitulo;
use App\Libro;

class DescargasController extends Controller
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


        $datos = Descarga::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);

        $libro = Libro::findOrFail($libro_id);
        return view('descarga.all', compact('libro','datos', 'libro_id'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulo = Capitulo::find(Session::get('capitulo_id'));
        $libro = Libro::find($capitulo->libro_id);
        return view('descarga.formTable', compact('capitulo', 'libro'));
    }
    public function createAdmin()
    {
        //Libros
        $libros = DB::select("select * from libros");
        //Capitulos
        $capitulos = DB::select("select * from capitulos");
        return view('descarga.formTable', compact('libros', 'capitulos'));
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
            'file' => 'required|mimetypes:text/plain,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.oasis.opendocument.text'
        ]);
        $datos = new Descarga;
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        //Archivo
        //$datos->tipo_archivo = $request->tipo_archivo;
        $archivo = $request->file;
        //Lo muevo a la carpeta
        $archivo->move('descargas', $archivo->getClientOriginalName());
        //Lo guardo en la base de datos
        $datos->archivo ="descargas/" .$archivo->getClientOriginalName();

        $id = Session::get('capitulo_id');
        

        if(isset($request->capitulo_id) && $request->capitulo_id!=null){
            $datos->capitulo_id = $request->capitulo_id;
            $datos->save();
            return redirect()->route('descarga.admin');
        }else{
            $capitulo_id = Session::get('capitulo_id');
            $datos->capitulo_id = $capitulo_id;
            $datos->save();
            return redirect()->route('libro.descargas', $capitulo_id);
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

        //Capitulos y libros
        $capitulo = Capitulo::findOrFail($datos->capitulo_id);
        $libro = Libro::findOrFail($capitulo->libro_id);

        return view('descarga.formTable', compact('datos', 'capitulo', 'libro'));
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
            'file' => 'mimetypes:text/plain,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.oasis.opendocument.text'
        ]);
        $datos = Descarga::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        $capitulo_id = Session::get('capitulo_id');
        $datos->capitulo_id = $capitulo_id;

        //$datos->tipo_archivo = $request->tipo_archivo;

        

        //Descargas
        $archivo = $request->file;
        if($archivo != null){
            $archivo->move('descargas', $archivo->getClientOriginalName());
            $datos->archivo = "descargas/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();

        $id = Session::get('capitulo_id');
        return redirect()->route('libro.descargas', $id);
    }
    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'file' => 'mimetypes:text/plain,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.oasis.opendocument.text'
        ]);
        $datos = Descarga::findOrFail($id);
        $datos->titulo = $request->titulo;
        $datos->descripcion = $request->descripcion;

        $capitulo_id = Session::get('capitulo_id');
        $datos->capitulo_id = $capitulo_id;

        //$datos->tipo_archivo = $request->tipo_archivo;

        

        //Descargas
        $archivo = $request->file;
        if($archivo != null){
            $archivo->move('descargas', $archivo->getClientOriginalName());
            $datos->archivo = "descargas/" . $archivo->getClientOriginalName();
        }
        //Guardo la imagen con sus datos
        $datos->save();

        $id = Session::get('capitulo_id');
        return redirect()->route('descarga.admin', $id);
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

        return redirect()->route('libro.descargas', $id_capitulo);
    }
    public function deleteAdmin($id)
    {
        $datos = Descarga::findOrFail($id);
        $id_capitulo = $datos->capitulo_id;
        unlink($datos->archivo);
        $datos->delete();

        return redirect()->route('descarga.admin', $id_capitulo);
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
        $libro = Libro::findOrFail($libro_id);
        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $capitulo_id);

        //$datos = Descarga::where('capitulo_id', '=', $capitulo_id)->simplePaginate(4);
        $capitulo = Capitulo::find($capitulo_id);
        $datos = DB::select('Select * from descargas where capitulo_id=:id', ['id'=>$capitulo_id]);
        
        return view('descarga.descargaAll', compact('libro', 'capitulo', 'datos', 'libro_id'));
    }
    public function admin()
    {
        $descargas = $consulta = DB::select("
        select capitulos.titulo as capitulo, descargas.titulo, descargas.descripcion, descargas.archivo, descargas.id 
        from descargas 
        inner join capitulos on descargas.capitulo_id = capitulos.id");
        return view('descarga.all', compact('descargas'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Descarga::findOrFail($id);
        return view('descarga.showTable', compact('datos'));
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
        $datos = Descarga::findOrFail($id);
        return view('descarga.formTable', compact('datos', 'libros', 'capitulos'));
    }




    
}
