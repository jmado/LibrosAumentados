<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Modelo_3d;
use App\Capitulo;

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
        //Creo un nuevo modelo
        $modelo = new Modelo_3d;
        $modelo->titulo = $request->titulo;
        $modelo->descripcion = $request->descripcion;
        $capitulo_id = Session::get('capitulo_id');
        $modelo->capitulo_id = $capitulo_id;

        //Obtengo el archivo y creo una carpeta
        $elZip = $request->file;
        $filesystem = new Filesystem();
        try{
            $ruta = 'modelos3d/'.$request->titulo;
            $filesystem->mkdir($ruta);
            $modelo->modelo_3d = $ruta;

            $elZip->move('modelos3d/'.$request->titulo, $elZip->getClientOriginalName()); 
            exec("unzip ".$elZip->getClientOriginalName());//esto no funciona

        }catch(IOExceptionInterface $exception){
            dd("No funciona. Nada nuevo bajo el sol");
        }
        $modelo->save();

        /*
        if (mkdir('modelos3d/'.$request->titulo)) {
            echo 'directorio true';
            
            $modelo->titulo = $request->titulo;
             
                                                                    /*El archivo comprimido
                                                                    $archivo = $request->modelo_3d;
                                                                    $zip = new ZipArchive;
                                                                    if ($zip->open($archivo) == true) {
                                                                        echo 'descomprimir true';
                                                                        $zip->extractTo('public/modelos3d/' . $request->titulo);
                                                                        $zip->close();

                                                                        $modelo->modelo_3d = 'public/modelos3d/' . $request->titulo;

                                                                        $modelo->save();
                                                                    } else {
                                                                        echo 'descomprimir fallo';
                                                                    }
                                                                    
                                                                    
            $elZip = $request->file;
            $elZip->move('modelos3d/'.$request->titulo, $elZip->getClientOriginalName());
            exec("unzip ".$elZip->getClientOriginalName());

            $modelo->modelo_3d =$request->titulo;
            $modelo->save();
        } else {
            echo 'directorio fallo';
        }
        */

        $id = $request->capitulo_id;
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
        $modelo = Modelo_3d::findOrFail($id);

        $modelo->descripcion = $request->descripcion;

        $capitulo_id = Session::get('capitulo_id');
        $modelo->capitulo_id = $capitulo_id;

        //Obtengo el titulo y creo una carpeta
        
        if (mkdir('public/modelos3d/' . $request->titulo, 0777)) {
            echo 'directorio true';
            
            $modelo->titulo = $request->titulo;
            
            //El archivo comprimido
            $archivo = $request->modelo_3d;
            $zip = new ZipArchive;
            if ($zip->open($archivo) == true) {
                echo 'descomprimir true';
                $archivo->move('imagenes', $archivo->getClientOriginalName());
                $zip->extractTo('public/modelos3d/' . $archivo);
                $zip->close();

                $modelo->modelo_3d = $request->titulo;

                $modelo->save();
            } else {
                echo 'descomprimir fallo';
            }
        } else {
            echo 'directorio fallo';
        }

        return redirect()->route('imagen.all', $capitulo_id);
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
        $capitulo_id = $modelo->capitulo_id;
        
        //Modelo_3dController::rrmdir($modelo->modelo_3d);
        $modelo->delete();

        return redirect()->route('modelo.all', $capitulo_id);
    }



    /**
     * Borrar ficheros 3d completos ( carpeta raiz , ficheros internos, subcarpetas y ficheros de las subcarpetas )
     * 
     * @param ZipArchive $file
     * @return boolean $result
     */
    public function rrmdir($file){
        //$result = false;
        
        if (is_dir($file)) {
            $archivos = scandir($file);
            foreach ($archivos as $archivo){
                if ($archivo != "." && $archivo != "..") {
                    if (filetype($file."/".$archivo) == "dir") {
                        rrmdir($file."/".$archivo);
                    } else{
                        unlink($file."/".$archivo);
                    }
                }
            }
            //Establece el puntero interno de un array a su primer elemento
            reset($archivos);
            //Borro el directorio
            rmdir($file);
        }
    }


    
}
