<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

//use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
//use Symfony\Component\Filesystem\Filesystem;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Modelo_3d;
use App\Capitulo;
use App\Libro;

class Modelo_3dController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);


        $modelos = Modelo_3d::where('capitulo_id', '=', $id)->simplePaginate(6);
        return view('modelo3d.all', compact('modelos', 'libro_id'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulo_id = Session::get('capitulo_id');
        return view('modelo3d.form', compact('capitulo_id'));
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
            'file' => 'required|mimetypes:application/zip'
        ]);

        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $file = $request->file;
        $capitulo_id = Session::get('capitulo_id');

        $modelo = new Modelo_3d;
        $modelo->titulo = $titulo;
        $modelo->descripcion = $descripcion;
        $modelo->capitulo_id = $capitulo_id;



        //Crear la una carpeta con el nombre del archivo.zip
        $carpeta_ruta = "modelos3d/" . $titulo;
       
        $process = new Process('mkdir ' . $carpeta_ruta);
        $process->run();
        if(!$process->isSuccessful()){
            //throw new \RuntimeException($process->getErrorOutput());
        }
        //print $process->getOutput();



        //Muevo el archivo
        $file->move( $carpeta_ruta , $file->getClientOriginalName() );


        //Extraer en archivo zip    
        //dd('unzip ' . $carpeta_ruta . "/" . $file->getClientOriginalName() . " -d ". $carpeta_ruta);   
        $process = new Process('unzip ' . $carpeta_ruta . "/" . $file->getClientOriginalName() . " -d " . $carpeta_ruta);
        $process->run();
        
       
    
        //Elimino el ZIP
        $file = $carpeta_ruta."/".$file->getClientOriginalName();
        //dd($file);
        $process = new Process('rm -f ' . $file);
        $process->run();


        $modelo->modelo_3d = $titulo;
        $modelo->save();

        return redirect()->route('modelo.all', $capitulo_id);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo_3d::findOrFail($id);
        return view('modelo3d.modelo3d', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capitulo_id = Session::get('capitulo_id');
        $modelo = Modelo_3d::findOrFail($id);
        return view('modelo3d.form', compact('modelo', 'capitulo_id'));
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
            'file' => 'mimetypes:application/zip'
        ]);

        $modelo = Modelo_3d::findOrFail($id);

        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $capitulo_id = Session::get('capitulo_id');
        

        

        
        //Renombrar direcorio
        $process = new Process('mv modelos3d/' . $modelo->titulo .' modelos3d/' . $titulo);
        $process->run();


        $modelo->titulo = $titulo;
        $modelo->descripcion = $descripcion;
        $modelo->capitulo_id = $capitulo_id;
        
        $file = $request->file;

        if($file != null){
            //Borrar directorio texturas
            $process = new Process('rm -r modelos3d/' . $titulo .'/textures');
            $process->run();

            //Actualizo el campo en la base de datos
            $modelo->modelo_3d = $titulo;

            //Muevo y descomprimo el zip
            $carpeta_ruta = "modelos3d/" . $titulo;
            $file->move( $carpeta_ruta , $file->getClientOriginalName() );


            //Extraer en archivo zip    
            $process = new Process('unzip ' . $carpeta_ruta . "/" . $file->getClientOriginalName() . " -d " . $carpeta_ruta);
            $process->run();

           

            //Elimino el ZIP
            $process = new Process('rm -f modelos3d/' . $titulo . '/' . $file->getClientOriginalName());
            $process->run();

           
        }
       

        $modelo->save();
        


        return redirect()->route('modelo.all', $capitulo_id);
        
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelo = Modelo_3d::findOrFail($id);
        $capitulo_id = Session::get('capitulo_id');
        
        $file ="modelos3d/" . $modelo->modelo_3d;
        

        //Elimino la carpeta
        $process = new Process('rm -r ' . $file);
        $process->run();
        
        
        $modelo->delete();

        return redirect()->route('modelo.all', $capitulo_id);
    }
















    //Backend CRUD Administrador ******************************************************************************************************************
    public function adminIndex($id)
    {
        
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;
        $libro = Libro::findOrFail($libro_id);

        
        
        $capitulo = Capitulo::findOrFail($id);
        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);


        //$modelos = Modelo_3d::where('capitulo_id', '=', $id)->simplePaginate(6);
        $datos = DB::select('Select * from modelo_3ds where capitulo_id=:id', ['id'=>$id]);

       

        return view('modelo3d.modelo3dAll', compact('libro', 'capitulo', 'datos', 'libro_id'));
    }
    public function admin()
    {
        $modelos = $consulta = DB::select("select * from modelo_3ds");
        return view('modelo3d.modeloAll', compact('modelos'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Modelo_3d::findOrFail($id);
        return view('modelo3d.showTable', compact('datos'));
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
        return view('modelo3d.formTable', compact('libros', 'capitulos'));
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
        $datos = Modelo_3d::findOrFail($id);
        return view('modelo3d.formTable', compact('datos', 'libros', 'capitulos'));
    }
    
}
