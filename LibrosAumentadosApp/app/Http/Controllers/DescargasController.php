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

        $capitulos = Session::get('capitulo_id');
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
        $datos->capitulo_id = $id;
        
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
        $libro_id = Session::get('libro_id');
        return view('descarga.show', compact('datos', 'libro_id'));
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
        $capitulos = Session::get('capitulo_id');
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
