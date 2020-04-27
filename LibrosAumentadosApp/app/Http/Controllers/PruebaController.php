<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


use App\Libro;
use App\Pagina;
use App\Capitulo;
use App\Imagen;
use App\Galeria;
use App\Audio;
use App\Video;
use App\Descarga;
use App\Modelo_3d;


class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($libro_id)
    {
        Session::put('libro_id', $libro_id);

        $libro = DB::select("select * from libros where id=:id", ['id'=>$libro_id]);

        
        $capitulos = DB::select("select * from capitulos where libro_id=:id", ['id'=>$libro_id]);

        $mensage_login = $this->login($libro_id);

        $libros = DB::select("select id, titulo from libros where id!=:id", ['id'=>$libro_id]);

        return view('capitulo.contenido', compact('libro', 'libros', 'capitulos', 'mensage_login'));
    }

    /**
     * Show the view for galeries for users .
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeria($id)
    {
        //Datos de la galeria
        $galeria = DB::select('select * from galerias where id=:id',['id'=>$id]);
        //Imagenes
        $imagenes=DB::select('select imagens.id, imagens.titulo, imagens.imagen 
        from imagens 
        inner join galeria_imagen on imagens.id=galeria_imagen.imagen_id 
        where galeria_imagen.galeria_id=:id', ['id'=>$id]);
        $libro_id = Session::get('libro_id');
        return view('galeria.galeria', compact('galeria','imagenes', 'libro_id'));
    }

    /**
     * Show the view for videos for users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function video($id)
    {
        
        $datos = Video::findOrFail($id);
        $url = $datos->video;
        $videoNumero = substr($url, 18);
        $libro_id = Session::get('libro_id');
        return view('video.show', compact('datos', 'videoNumero', 'libro_id'));
    }

    /**
     * Show the view for downloads for users
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function descarga($id)
    {
        $datos = Descarga::findOrFail($id);
        $libro_id = Session::get('libro_id');
        return view('descarga.show', compact('datos', 'libro_id'));
    }

    /**
     * Show the view for models for users
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modelo($id)
    {
        $libro_id = Session::get('libro_id');
        $modelo = Modelo_3d::findOrFail($id);
        return view('modelo3d.modelo3d', compact('modelo', 'libro_id'));
    }






//+++++++++++++++++++++++++++++++++++++++++Login++++++++++++++++++++++++++++++++++++
    /**
     * Sistema de login de usuarios
     *
     * @param  int  $libro_id
     * @return string $mensage_login
     */
    public function login($libro_id)
    {
    $capitulo;
    $pagina;
    $parrafo;
    $palabra;
        do{
            $capitulo = $this->capitulo_random($libro_id);
                $numero_capitulo = $capitulo->numero_orden;

            $pagina = $this->pagina_random($capitulo->id);
                $numero_pagina = $pagina->numero_pagina;

            $parrafos = $this->parrafos_limpios($pagina->texto);
            $parrafo = $this->parrafo_random($parrafos);
            
            $palabra = $this->validar_parrafo($parrafo["texto"]);
            
        }while($palabra==null);

    $datos = array(
        $capitulo,
        $pagina,
        $parrafo,
        $palabra
    );  
    //*********************************************************************
    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    $libro_session = $libro_id;
    Session::put($libro_session);
    */
    Session::put('palabra', $palabra["palabra"]);
    
    
    $mensage_login = array(
        "capitulo" => $capitulo->numero_orden,
        "pagina" => $pagina->numero_pagina,
        "parrafo" => $parrafo["posicion"],
        "palabra" => $palabra["posicion"]
    );
    
    /*
    $mensage_login = "<p class='mensage'>Escribe la palabra que corresponde al </p><p><span>Capítulo:</span> ".$capitulo->numero_orden."</p><p><span>Página:</span> ".$pagina->numero_pagina."</p><p><span>Párrafo:</span> ".$parrafo["posicion"]. "</p><p><span>Palabra:</span> ".$palabra["posicion"]. "</p>";

    $jsonstring = json_encode($mensage_login);
    echo $jsonstring;
    */
    return $mensage_login;    
    }




        private function capitulo_random($libro_id)
        {
            $capitulos = DB::select('select * from capitulos where libro_id = :id', ['id' => $libro_id]);
            $capitulo = $capitulos[rand(1, count($capitulos)) -1];
            return $capitulo;
        }
        private function pagina_random($capitulo_id)
        {
            $paginas = DB::select('select * from paginas where capitulo_id = :id', ['id' => $capitulo_id]);
            $pagina = $paginas[(rand(1, count($paginas))) -1];
            return $pagina;
        }
        private function parrafos_limpios($texto){
            $texto = str_replace(array("<div>","</div>"), "<br>", $texto);
            $texto = explode("<br>", $texto);
            $parrafos = array();
            foreach($texto as $linea){
                if($linea!=""){
                    array_push($parrafos, $linea);
                }
            }
            return $parrafos;
        }
        private function parrafo_random($parrafos){
            $posicion = rand(0, count($parrafos)-1)+1;
            $parrafo = $parrafos[$posicion-1];
            $datos = array(
                "posicion" => $posicion,
                "texto" => $parrafo
            );
            return $datos;
        }
        private function validar_parrafo($texto){
            $palabras = str_word_count($texto, 1);
            if(count($palabras)>=5){
                $posicion = rand(0, 4);
                $datos = array(
                    "posicion" => $posicion + 1,
                    "palabra" => $palabras[$posicion]
                );
                return $datos;
            }else{
                return null;
            }
            
        }


    /**
    * Compruebar password
    *
    * @param  int  $libro_id
    * @return string $mensage_login
    */
    public function loginConfirma(Request $request)
    {
        $password = $request->search;
        $login = "0";
        if(Session::get("palabra") == $password){
            $login = "1";
        }
        /*
        $datos = array(
            "sesion" => Session::get("palabra"),
            "pass" => $password,
            "request" => $request->search,
            "login" => $login
        );  
        */
        $jsonstring = json_encode($login);
        echo $jsonstring;
    }
        
//+++++++++++++++++++++++++++++++FIN Login++++++++++++++++++++++++++++++++++++++++++

/**
    * Buscador de libros por ajax
    *
    * @param  
    * @return string $mensage_login
    */
    public function libros(Request $request)
    {
        $search = $request->search;
        if(!empty($search)){
            $query="select * from libros where (titulo like '%$search%') order by titulo";
            $result =  DB::select($query);
            
            $jsonstring = json_encode($result);
            echo $jsonstring;
        }
    }



/**
    * Todo el contenido de un capitulo
    *
    * @param  int capitulo_id
    * @return string $multimedia
    */
    public function multimedia(Request $request)
    {
        
        $capitulo_id = $request->capitulo_id;
        
        $imagenes = DB::select("select * from imagens where capitulo_id=:id", ["id"=>$capitulo_id]);
        

        $galerias = DB::select("select * from galerias where capitulo_id=:id", ["id"=>$capitulo_id]);

        $audios = DB::select("select * from audio where capitulo_id=:id", ["id"=>$capitulo_id]);

        $videos = DB::select("select * from videos where capitulo_id=:id", ["id"=>$capitulo_id]);

        $descargas = DB::select("select * from descargas where capitulo_id=:id", ["id"=>$capitulo_id]);

        $modelos3d = DB::select("select * from modelo_3ds where capitulo_id=:id", ["id"=>$capitulo_id]);

        $datos = array (
            "imagenes" => $imagenes,
            "galerias" => $galerias,
            "audios" => $audios,
            "videos" => $videos,
            "descargas" => $descargas,
            "modelos3d" => $modelos3d
        );
        
               
            //$datos = $imagenes;
            $jsonstring = json_encode($datos);
            echo $jsonstring;
        
    }








}
