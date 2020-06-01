<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Imagen;
use App\Galeria;
use App\Capitulo;
use App\Libro;

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

        /*Imagenes de galerias
        $imagenes=DB::select('select imagens.imagen 
        from imagens 
        inner join galeria_imagen on imagens.id = galeria_imagen.imagen_id
        inner join galerias on galeria_imagen.galeria_id = galerias.id
        where galerias.capitulo_id =' . $capitulo .' group by galeria_imagen.galeria_id');
*/
/* 
        $imagenes = DB::table('imagens')
        ->select('imagens.imagen')
        ->join('galeria_imagen', function ($join) {
            $join->on('imagens.id', '=', 'galeria_imagen.imagen_id');
        })
        ->join('galerias', function ($join) {
            $join->on('galeria_imagen.galeria_id', '=', 'galerias.id');
        })
        ->where('galerias.capitulo_id', '=', $capitulo)
        ->groupBy('galeria_imagen.galeria_id')
        ;
        dd($imagenes);
        */
        //$imagenes = DB::table('imagens')->select('imagen', 'id')->get();
        /*$imagenes = DB::select("select imagens.imagen , galeria_imagen.galeria_id 
        from imagens 
        inner join galeria_imagen on imagens.id = galeria_imagen.imagen_id
        inner join galerias on galeria_imagen.galeria_id = galerias.id 
        
        where galerias.capitulo_id =:id", ['id'=> $id],
        );
        */
        /*
        $imagenes = DB::table('imagens')
        ->join('galeria_imagen', 'imagens.id', '=', 'galeria_imagen.imagen_id')
        ->join('galerias', 'galeria_imagen.galeria_id', '=', 'galerias.id')
        ->select('imagens.imagen', 'galerias.id')
        ->where('galerias.capitulo_id', '=', $id)
        ->orderByDesc('galerias.id')
        ->limit(1)
        ->get();
        */
        /*
        $imagenes=DB::select('select imagens.imagen, imagens.capitulo_id 
        from imagens 
        inner join galeria_imagen on imagens.id = galeria_imagen.imagen_id
        inner join galerias on galeria_imagen.galeria_id = galerias.id
        where galerias.capitulo_id=:id', ['id'=>$id]);
        */
        


        

        $libro = Libro::findOrFail($libro_id);
        return view('galeria.all', compact('libro', 'galerias', 'libro_id', 'capitulo', 'numero_orden'));
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
        //$imagenes = DB::table('imagens')->select('id', 'imagen')->where('capitulo_id', '=', $capitulo_id)->get();
        $imagenes = DB::select("select id, titulo, imagen from imagens where capitulo_id=:id",['id'=>$capitulo_id]);
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
        //dd($request->tipo);
        //Creo una galeria
        $datos_galeria = new Galeria;

        $datos_galeria->titulo = $request->titulo;
        $datos_galeria->descripcion = $request->descripcion;
        $datos_galeria->tipo = $request->tipo;
       
        //Cubierta
        $archivo = $request->cubierta;
        if($archivo==null){
            $datos_galeria->cubierta ="complementos/iconos/galeria.png" ;
        }
        else{
            //Lo muevo a la carpeta
            $archivo->move('imagenes', $archivo->getClientOriginalName());
            //Lo guardo en la base de datos
            $datos_galeria->cubierta ="imagenes/" .$archivo->getClientOriginalName();
        }

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
        $imagenes = DB::select('select id, imagen, titulo from imagens where capitulo_id=:id', ["id"=>$capitulo_id]);
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
        $datos_galeria->capitulo_id = Session::get('capitulo_id');
        $datos_galeria->tipo = $request->tipo;


        

        //Cubierta
        $archivo = $request->cubierta;
        if($archivo != null){
            $archivo->move('imagenes', $archivo->getClientOriginalName());
            $datos_galeria->cubierta ="imagenes/" .$archivo->getClientOriginalName();  
        }
             

        //Guardo la informacion de la galeria
        $datos_galeria->save();

        //Actualizo las imagenes relacionadas con la galeria
        $imagenes = $request->imagenes_id;
        if($imagenes != null){
            //Sincronizo los campos relacionados entre galerias e imagenes de forma automatica Laravel te quiero
            $datos_galeria->imagenes()->sync($imagenes);
        }
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




/**
    * Buscador de libros por ajax
    *
    * @param  
    * @return string $mensage_login
    */
    public function imagenBuscador(Request $request)
    {
        $id = Session::get('capitulo_id');
        $search = $request->search;
        if(!empty($search)){
            $query="select * from imagens where (titulo like '%$search%') and capitulo_id=".$id;
            $result =  DB::select($query);
            
            $jsonstring = json_encode($result);
            echo $jsonstring;
        }
    }






//Backend CRUD Administrador ******************************************************************************************************************
public function adminIndex($id)
    {
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);

        $capitulo = Capitulo::find($id);
        $numero_orden = DB::select("select numero_orden, id from capitulos where id=:id", ['id'=>$id]);


        $libro = Libro::findOrFail($libro_id);

        //$datos = Galeria::where('capitulo_id', '=', $id)->simplePaginate(3);
        $datos = DB::select('Select * from galerias where capitulo_id=:id', ['id'=>$id]);

        return view('galeria.galeriaAll', compact('libro', 'datos', 'libro_id', 'capitulo',));
    }
    public function admin()
    {
        $galerias = $consulta = DB::select("select * from galerias");
        
        return view('galeria.all', compact('galerias'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $datos = Video::findOrFail($id);
        return view('galeria.showTable', compact('datos'));
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
        //Imagenes
        $imagenes = DB::select("select * from imagens");
        return view('galeria.formTable', compact('libros', 'capitulos', 'imagenes'));
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
        //Imagenes
        $imagenes = DB::select("select * from imagens");
        //Elemento $id
        $datos = Video::findOrFail($id);
        return view('galeria.formTable', compact('datos', 'libros', 'capitulos', 'imagenes'));
    }













}
