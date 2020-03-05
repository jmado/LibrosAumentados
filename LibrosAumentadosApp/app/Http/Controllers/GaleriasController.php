<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Imagen;
use App\Galeria;
use App\Capitulo;

use App\Galeria_imagen;

class GaleriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $galerias = Galeria::where('capitulo_id', '=', $id)->simplePaginate(3);


        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);

        $capitulo = $id;

        $numero_orden = DB::select("select numero_orden, id from capitulos where id=:id", ['id'=>$id]);

        return view('galeria.all', compact('galerias', 'libro_id', 'capitulo', 'numero_orden'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Capitulo
        $capitulo_id = Session::get('capitulo_id');

        //Listado de imagenes
        $galerias = DB::select('select id, titulo from galerias where capitulo_id=:id',['id'=>$capitulo_id]);

        //Listado de galerias existentes
        $imagenes = DB::table('imagens')->select('id', 'imagen')->where('capitulo_id', '=', $capitulo_id)->get();

        return view('galeria.form', compact('capitulo_id','imagenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creo una galeria
        $datos_galeria = new Galeria;

        $datos_galeria->titulo = $request->titulo;
        $datos_galeria->descripcion = $request->descripcion;
        $datos_galeria->tipo = $request->tipo;
        $capitulo = Session::get('capitulo_id');
        $datos_galeria->capitulo_id = $capitulo;
        //Guardo galeria
        $datos_galeria->save();

        //Id de la galeria
        $id = DB::select('select max(id) as "id" from galerias');
        $galeria_id = $id[0]->id;
        //Array con todas las id de imagenes
        $imagenes_id = $request->imagenes_id;
        $datos_galeria->imagenes()->sync($imagenes_id);

        return redirect()->route('galeria.all', $capitulo);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Datos de la galeria
        $galeria = DB::select('select * from galerias where id=:id',['id'=>$id]);
        //Imagenes
        $imagenes=DB::select('select imagens.id, imagens.titulo, imagens.imagen 
                            from imagens 
                            inner join galeria_imagen on imagens.id=galeria_imagen.imagen_id 
                            where galeria_imagen.galeria_id=:id', ['id'=>$id]);
        return view('galeria.galeria', compact('galeria','imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = Galeria::findOrFail($id);
        $capitulo_id = $galeria->capitulo_id;
        $imagenes = Imagen::where('capitulo_id', '=', $capitulo_id);
        return view('galeria.form', compact('galeria', 'imagenes', 'capitulo_id'));
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
        //Campos de galeria
        $datos_galeria = Galeria::findOrFail($id);
        $datos_galeria->titulo = $request->titulo;
        $datos_galeria->descripcion = $request->descripcion;
        $datos_galeria->capitulo_id = $request->capitulo_id;
        $datos_galeria->tipo = $request->tipo;

        
        //Guardo la informacion de la galeria
        $datos_galeria->save();

        //Actualizo las imagenes relacionadas con la galeria
        $imagenes_id = $request->imagenes_id;
        $galeria_id = $request->galeria_id;

        //Sincronizo los campos relacionados entre galerias e imagenes de forma automatica Laravel te quiero
        $datos_galeria->imagenes()->sync($imagenes_id);
        return redirect()->route('galeria.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Galeria::findOrFail($id);
        $id_capitulo = $datos->capitulo_id;
        $datos->delete();
        return redirect()->route('galeria.all', $id_capitulo);
    }
}
