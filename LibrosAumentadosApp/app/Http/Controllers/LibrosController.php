<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Libro;
use App\Capitulo;
use App\Pagina;

class LibrosController extends Controller
{

    private $palabra;
    public $capitulo;
    public $pagina;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libroList = Libro::all();
        //$libroList = DB::select('select libros.id, libros.titulo, libros.subtitulo, libros.cubierta, capitulos.id as capitulo
                             //   from libros
                             //   inner join capitulos on libros.id=capitulos.libro_id');
        return view('libro.all', compact('libroList'));
    }

/*
    public function welcome()
    {
        
        $libroList = Libro::all();
        //$libroList = DB::select('select libros.id, libros.titulo, libros.subtitulo, libros.cubierta, capitulos.id as capitulo
                             //   from libros
                             //   inner join capitulos on libros.id=capitulos.libro_id');
        return view('welcome', compact('libroList'));
    }
    */
    
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

        return redirect()->route('libro.index');
        
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

        return redirect()->route('libro.index');
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
        
        return redirect()->route('libro.index');
    }




     /*--------------------------------------------------------
    private $palabras;
    funcion -> mandarte a validacion de libro id
    public function usuario($id_libro){
        //data = obtener palabras

        return view('accesoUsu', compact('data'));
    }

    public function validacion($id, $r){
        if
            auth
            return 
        else
            return 
    }
    -------------------------------------------------------- */
    
    public function usuario($id_libro)
    {       
        $mensaje = "Dame la ".$palabra."ª palabra de la pagina ".$pagina." del capitulo ".$capitulo;
        
    }

    public function loginVisitante($id_libro) {
        $idCapitulo = 7;
        $capitulos = Libro::getCapitulos($id_libro);
        $numCapitulo = rand(0, $capitulos->count()-1);
        $capitulo = $capitulos->get($numCapitulo);


        $paginas = Libro::getPaginas($capitulo->id);
        $numPagina = rand(0, $paginas->count()-1);
        $contenidoPagina = $paginas->get($numPagina);
        

        $parrafos = explode("\n", $paginas);
        $numParrafo = rand(0, count($parrafos)-1);
        $contenidoParrafo = $parrafos[$numParrafo];
        
        $palabras = explode(" ", $contenidoParrafo);
        $numPalabra = rand(1,5);
        $palabraElegida = $palabras[$numPalabra];
        echo "He elegido el capitulo $idCapitulo, la página $numPagina, el párrafo $numParrafo y la palabra $numPalabra<br>";
        echo "La palabra secreta elegida ha sido: $palabraElegida";

    }


}
