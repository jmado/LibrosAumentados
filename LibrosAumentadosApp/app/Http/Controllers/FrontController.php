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


class FrontController extends Controller
{
    //+++++++++++++++++++++++++++++++ Metodo PRINCIPAL ++++++++++++++++++++++++++++++++
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('libro_id', $libro_id);

        $libro = DB::select("select * from libros where id=:id", ['id'=>$libro_id]);

        $capitulos = DB::select("select * from capitulos where libro_id=:id", ['id'=>$libro_id]);

        $libros = DB::select("select id, titulo from libros where id!=:id", ['id'=>$libro_id]);


        //Login ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        //$login = array($login_capitulo, $login_pagina, $login_parrafo, $login_palabra);
        $login = $this->login2($libro_id);
        //FIN Login ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        //Comprobar si hay sesion
        $sesion = Session::get('sesion');

        //Si existe sesion en ese libro
        if($sesion == $libro_id){    
            //Multimedia
            $imagenes = array(); $galerias = array();
            $audios = array(); $videos = array();
            $descargas = array(); $modelos = array();
            foreach($capitulos as $capitulo){
                $id = $capitulo->id;
                array_push($imagenes, DB::select("select * from imagens where capitulo_id=:id", ["id"=>$id]));
                array_push($galerias, DB::select("select * from galerias where capitulo_id=:id", ["id"=>$id]));
                array_push($audios, DB::select("select * from audio where capitulo_id=:id", ["id"=>$id]));
                array_push($videos, DB::select("select * from videos where capitulo_id=:id", ["id"=>$id]));
                array_push($descargas, DB::select("select * from descargas where capitulo_id=:id", ["id"=>$id]));
                array_push($modelos, DB::select("select * from modelo_3ds where capitulo_id=:id", ["id"=>$id]));
            }
            $datos = array($imagenes, $galerias, $audios, $videos, $descargas, $modelos);
            
            return view('capitulo.contenido', compact('libro', 'libros', 'capitulos', 'datos'));
        }else{
            return view('capitulo.contenido', compact('libro', 'libros', 'capitulos', 'datos', 'login'));
        }    
    }
    //Login
    public function login2(){
        //Seleccionar las paginas
        $paginas = DB::select('select * from paginas INNER JOIN capitulos ON paginas.capitulo_id = capitulos.id WHERE capitulos.libro_id=:id', ['id' =>$libro_id]);
        
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
    //+++++++++++++++++++++++++++++++Buscador de libros ++++++++++++++++++++++++++++++++
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
        }else{
            $query="select * from libros order by titulo";
            $result =  DB::select($query);
        }
        $jsonstring = json_encode($result);
        echo $jsonstring;
    }



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
    
    Session::put('palabra', $palabra["palabra"]);
    
    
    $mensage_login = array(
        "capitulo" => $capitulo->numero_orden,
        "pagina" => $pagina->numero_pagina,
        "parrafo" => $parrafo["posicion"],
        "palabra" => $palabra["posicion"]
    );
    
    
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
            $libro = Session::get('libro_id');
            Session::put("sesion", $libro);
        }
        $jsonstring = json_encode($login);
        echo $jsonstring;
    }
        
//+++++++++++++++++++++++++++++++FIN Login++++++++++++++++++++++++++++++++++++++++++








    
}
