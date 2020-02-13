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
        $libroList = DB::table('libros')->simplePaginate(3);
        return view('libro.all', compact('libroList'));
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

    
    public function usuario($id_libro)
    {       
        $mensaje = "Dame la ".$palabra."ª palabra de la pagina ".$pagina." del capitulo ".$capitulo;
        
    }

    public function loginVisitante($id_libro) {
        $capitulos = Libro::getCapitulos($id_libro);
        $numCapitulo = rand(0, $capitulos->count()-1);
        $capitulo = $capitulos->get($numCapitulo);


        $paginas = Libro::getPaginas($capitulo->id);
        $numPagina = rand(0, $paginas->count()-1);
        $contenidoPagina = $paginas->get($numPagina)->texto;

        $parrafos = explode("<br>", $contenidoPagina);
        $numParrafo = rand(0, count($parrafos)-1);
        $contenidoParrafo = $parrafos[$numParrafo];

        $parafo_limpio = $this->limpiarParrafo($contenidoParrafo);

        $palabras = explode(" ", $parafo_limpio);
        $numPalabra = rand(0, 4);
        $palabraElegida = $palabras[$numPalabra];
        
        echo $contenidoPagina;
        echo $numPalabra."<br>";
        echo "He elegido el capitulo ID = ".$capitulo->id."<br><br>Página: $numPagina<br><br>Párrafo $numParrafo ($contenidoParrafo)<br><br>Palabra $numPalabra ($palabraElegida)<br>";
        echo $palabraElegida;

    }

    private function limpiarParrafo($contenidoParrafo)
    {
        $pos1 = strpos($contenidoParrafo, "<");
        $pos2 = strpos($contenidoParrafo, ">");
       
        while($pos1 !== false)
        {
            str_replace(">", $contenidoParrafo, "> ");
            $texto_borrar = substr($contenidoParrafo, $pos1, ($pos2-$pos1)+1);         
            $contenidoParrafo = str_replace($texto_borrar, " ", $contenidoParrafo);            
            $pos1 = strpos($contenidoParrafo, "<");
            $pos2 = strpos($contenidoParrafo, ">");
        }   

        return $contenidoParrafo;

    }


}
