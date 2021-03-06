<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Libro;
use App\Capitulo;
use App\Pagina;

class LibrosController extends Controller
{

    private $palabra;
    public $capitulo;
    public $pagina;
    public $numParrafo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libroList = DB::table('libros')->simplePaginate(8);
        return view('libro.all', compact('libroList'));
    }

    public function adminIndex()
    {
        //$libros = DB::table('libros')->simplePaginate(8);
        $libros = DB::select('select * from libros');
        return view('libro.libroAll', compact('libros'));
    }
    public function admin()
    {
        $libros = DB::select('select * from libros');
        return view('libro.libroTable', compact('libros'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
       
        
        $lib = new Libro($r->all());
        $file = $r->file('cubierta');
        if ($file != null) {
            $lib->cubierta = "/imagenes/".$file->getClientOriginalName();
            $r->cubierta->move(base_path('public/imagenes'), $file->getClientOriginalName());
        } else {
            $lib->cubierta = 'sin-cubierta';
        }

        $lib->save();

        return redirect()->route('libro.adminIndex');
        
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
        $libro = Libro::find($id);
        return view('libro.form', ["libro" => $libro] );
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
        $lib = Libro::find($id);

        $lib->fill($r->all());
        $file = $r->file('cubierta');
        
        if ($file != null) {
            $lib->cubierta = "/imagenes/".$file->getClientOriginalName(); 
            $r->cubierta->move(base_path('public/imagenes'), $file->getClientOriginalName());
        }

        $lib->save();

        return redirect()->route('libro.adminIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lib = Libro::find($id);
        $lib->delete();
        
        return redirect()->route('libro.adminIndex');
    }

    /**
     * Comprueba si el libro tiene contenido
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteConfirm($id){
        $capitulos = DB::select('select id from capitulos where libro_id=:id',['id'=>$id]);
        
        if(count($capitulos) == 0){
            return redirect()->route('libro.delete', $id);
        }
        else{
            return redirect()->route('libro.index');
        }
    }

    public function usuario($id_libro)
    {       
        $mensaje = "Dame la ".$palabra."ª palabra de la pagina ".$pagina." del capitulo ".$capitulo;
        
    }

    public function loginVisitante($id_libro) {

        $libro = DB::table('libros')->select('titulo')->where('id', '=', $id_libro)->first();
        $libro = $libro->titulo;

        // Primero elegimos un capítulo al azar del libro actual
        $capitulos = Libro::getCapitulos($id_libro);
        $numCapitulo = rand(0, $capitulos->count()-1);
        $capitulo = $capitulos->get($numCapitulo);

        // Después, elegimos una página al azar del capítulo seleccionado
        $paginas = DB::select("select * from paginas where capitulo_id=:id",['id'=>$capitulo->id]);   
      
        $numPagina = rand(0, count($paginas)-1);
        $numero_pagina = $paginas[$numPagina]->numero_pagina;
        $contenidoPagina = $paginas[$numPagina]->texto; 

        // Ahora vamos a elegir un párrafo al azar de esa página.
        // No todos los párrafos valen, solo los que tengan más de 5 palabras.
        $parrafoOk = false;
        $contenidoParrafo = "";
        while (!$parrafoOk) {
            // Elegimos un párrafo al azar
            $contenidoParrafo = $this->elegirParrafo($contenidoPagina);
            // Comprobamos que el párrafo es válido
            $parrafoOk = $this->comprobarParrafo($contenidoParrafo);
        }

        // Limpiamos el código HTML del párrafo y todos los signos de puntuación
        $parrafo_limpio = $this->limpiarParrafo($contenidoParrafo);

        // Extraemos todas las palabras del párrafo en un array
        $palabras = explode(" ", $parrafo_limpio);
        // Elegimos una palabra al azar y la almacenamos en una variable de sesión
        $numPalabra = rand(0, 4);
        Session::put('palabraElegida', $palabras[$numPalabra]);
        $palabraElegida = Session::get('palabraElegida');
        echo "$palabraElegida";
        // $textoUsuario = "Del libro $libro he elegido el Capítulo: ".$capitulo->numero_orden." Página: ".($numPagina + 1)." Párrafo: ".Session::get('parrafo_numero')." Palabra: ".($numPalabra + 1)."";
        $textoUsuario = "Del libro $libro he elegido el Capítulo: ".$capitulo->numero_orden." Página: ".$numero_pagina." Párrafo: ".Session::get('parrafo_numero')." Palabra: ".($numPalabra + 1)."";


        $book = Libro::find($id_libro);
        $palabra = $numPalabra + 1;
        $contenido = [
            'id_libro' =>$id_libro,
            "libro" => $book->titulo,
            "imagen" => $book->cubierta,
            "capitulo" => $capitulo->numero_orden,
            "pagina" => $numero_pagina,
            "parrafo" => Session::get('parrafo_numero'),
            "palabra" => $palabra
        ];
        //dd($contenido);
        //return view('libro.logUsu', compact("textoUsuario", "id_libro"));
        return view('libro.logUsu', compact("contenido"));

    }
    
    private function elegirParrafo($contenidoPagina)
    {
        $parrafos = explode("<br>", $contenidoPagina);
        $numParrafo = rand(0, count($parrafos)-1);
        Session::put('parrafo_numero', $numParrafo);
        $contenidoParrafo = $parrafos[$numParrafo];

        // echo "Párrafo elegido: $numParrafo <br>"; //Hay que sumar 1 ".($numParrafo + 1)." ???

        return $contenidoParrafo;
    }

    private function comprobarParrafo($contenidoParrafo)
    {
        $longitud_parrafo = str_word_count($contenidoParrafo, 1);
        if(count($longitud_parrafo) < 5) {
            return false;
        } else {
            return true;
        }
    }

    private function limpiarParrafo($contenidoParrafo)
    {
        
        //Limpiar el texto de etiquetas HTML
        $texto_limpio = strip_tags($contenidoParrafo);

        //Limpiar el texto de signos de puntuación
        $texto_limpio = str_replace(",", "", $texto_limpio);
        $texto_limpio = str_replace(".", "", $texto_limpio);
        $texto_limpio = str_replace("-", "", $texto_limpio);
        $texto_limpio = str_replace("—", "", $texto_limpio);
        $texto_limpio = str_replace("?", "", $texto_limpio);
        $texto_limpio = str_replace("¿", "", $texto_limpio);
        $texto_limpio = str_replace("!", "", $texto_limpio);
        $texto_limpio = str_replace("¡", "", $texto_limpio);
        $texto_limpio = str_replace(":", "", $texto_limpio);
        $texto_limpio = str_replace(";", "", $texto_limpio);
        $texto_limpio = str_replace("[", "", $texto_limpio);
        $texto_limpio = str_replace("]", "", $texto_limpio);
        $texto_limpio = str_replace("{", "", $texto_limpio);
        $texto_limpio = str_replace("}", "", $texto_limpio);    
        $texto_limpio = str_replace("(", "", $texto_limpio);
        $texto_limpio = str_replace(")", "", $texto_limpio);
        $texto_limpio = str_replace("\"", "", $texto_limpio);
        $texto_limpio = str_replace("\'", "", $texto_limpio);
        $texto_limpio = str_replace("|", "", $texto_limpio);
        $texto_limpio = str_replace("/", "", $texto_limpio);
        $texto_limpio = str_replace("*", "", $texto_limpio);
        $texto_limpio = str_replace("+", "", $texto_limpio);
        $texto_limpio = str_replace("á", "a", $texto_limpio);
        $texto_limpio = str_replace("é", "e", $texto_limpio);
        $texto_limpio = str_replace("í", "i", $texto_limpio);
        $texto_limpio = str_replace("ó", "o", $texto_limpio);
        $texto_limpio = str_replace("ú", "u", $texto_limpio);

        /*return $nuevo_texto;*/
        
         return $texto_limpio;
    }

    public function comprobarPalabra(Request $r)
    {
        $palabraElegida = Session::get('palabraElegida');
        Session::forget('palabraElegida');

        if (strcasecmp($r->palabra, $palabraElegida) == 0)
        {
            $capituloList = Capitulo::where('libro_id', '=', $r->id_libro)->simplePaginate(3);
            //Session::put('dentro', $r->id_libro);
            //$dentro = Session::get('dentro');
            //return view('capitulo.all', compact('capituloList'));
           
            return redirect()->route('capitulo.all', $r->id_libro);
        }else
        {
            Session::put('dentro', 'false');
            //$dentro = Session::get('dentro');
            $libroList = DB::table('libros')->simplePaginate(3);
            //return view('libro.all', compact('libroList'));
            return redirect()->route('libro.index');
        }

        
    }










    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        return view('libro.formTable');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        $datos = Libro::find($id);
        return view('libro.formTable', ["datos" => $datos] );
    }

}
