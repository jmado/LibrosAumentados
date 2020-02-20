<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $modelos = Modelo_3d::where('capitulo_id', '=', $id)->simplePaginate(6);
        return view('modelo3d.all', compact('modelos', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modelo3d.form');
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

        $modelo->descripcion = $request->descripcion;
        $modelo->capitulo_id = $request->capitulo_id;

        //Obtengo el titulo y creo una carpeta
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
                                                                    */
                                                                    
            $elZip = $request->file;
            $elZip->move('modelos3d/'.$request->titulo, $elZip->getClientOriginalName());
            exec("unzip ".$elZip->getClientOriginalName());

            $modelo->modelo_3d = 'public/modelos3d/' . $request->titulo;
            $modelo->save();
        } else {
            echo 'directorio fallo';
        }
        $id = $request->capitulo_id;
        return redirect()->route('modelo.all', $id);
         
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
        $modelo = Modelo_3d::findOrFail($id);
        return view('modelo3d.form', compact('modelo'));
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
        //$modelo->capitulo_id = $request->capitulo_id;

        //Obtengo el titulo y creo una carpeta
        
        if (mkdir('public/modelos3d/' . $request->titulo, 0777)) {
            echo 'directorio true';
            
            $modelo->titulo = $request->titulo;
            
            //El archivo comprimido
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
        } else {
            echo 'directorio fallo';
        }

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
        $id_capitulo = $modelo->capitulo_id;
        
        Modelo_3dController::rrmdir($modelo->modelo_3d);
        $modelo->delete();

        return redirect()->route('modelo.all', $id_capitulo);
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
