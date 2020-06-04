<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Pagina;
use App\Capitulo;
use App\Libro;

class PaginasController extends Controller
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

        $numero_orden = DB::select("select numero_orden, id from capitulos where id=:id", ['id'=>$id]);

        $paginaList = Pagina::where('capitulo_id', '=', $id)->simplePaginate(3);

        $id = $libro_id;
        
        return view('pagina.all', compact('paginaList', 'id', 'numero_orden'));
    }
    
    public function mostrarPaginaCapitulo($id_capitulo)
    {
        $paginaList = Pagina::where('capitulo_id', '=', $id_capitulo)->get();
        return view('pagina.all', compact('paginaList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
       
        $pagina = new Pagina;
        

        if(isset($r->capitulo_id) && $r->capitulo_id!= null){
            
            $capitulo_id = $r->capitulo_id;
        }else{
            $capitulo_id = Session::get('capitulo_id');
        }
        $pagina->capitulo_id = $capitulo_id;



        $pagina->numero_pagina = $r->numero_pagina;
        $pagina->texto = $r->texto;

        //$pag = new Pagina($r->all());

        $pagina->save();
        //$pag->capitulo()->associate($r->capitulo_id);
        $pagina->capitulo()->associate(Session::get('capitulo_id'));

        if(isset($r->capitulo_id) && $r->capitulo_id!= null){   
            return redirect()->route('pagina.admin');  
        }else{
            return redirect()->route('libro.paginas', $capitulo_id);  
        }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pagina.all');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $pagina = Pagina::find($id);
        return view('pagina.form', compact('pagina'));
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
        
        $pag = Pagina::find($id);
        if(isset($r->capitulo_id) && $r->capitulo_id!= null){
            $capitulo_id = $r->capitulo_id;
        }else{
            $capitulo_id = Session::get('capitulo_id');
        }
        
        $pag->numero_pagina = $r->numero_pagina;
        $pag->texto = $r->texto;

        
        $pag->capitulo_id = $capitulo_id;

        $pag->save();

        //return redirect()->route('capitulo.all', $pag->capitulo_id);
        return redirect()->route('pagina.all', $capitulo_id);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pag = Pagina::find($id);
        $id_capitulo = $pag->capitulo_id;
        $pag->delete();

        return redirect()->route('libro.paginas', $id_capitulo);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex($id)
    {
        $libro_id = $consulta = DB::select("select libro_id from capitulos where id=:id", ['id'=>$id]);
        $libro_id = $libro_id[0]->libro_id;
        $libro = Libro::findOrFail($libro_id);
        $capitulo = Capitulo::findOrFail($id);

        //Variables de sesion para imagenes
        Session::put('libro_id', $libro_id);
        Session::put('capitulo_id', $id);

        

        //$paginaList = Pagina::where('capitulo_id', '=', $id)->simplePaginate(3);
        $datos = DB::select('Select * from paginas where capitulo_id=:id', ['id'=>$id]);

        $id = $libro_id;
        return view('pagina.paginaAll', compact('libro', 'capitulo', 'datos'));
    }
    public function admin()
    {
        $paginas = $consulta = DB::select("select * from paginas");
        
        return view('pagina.all', compact('paginas'));
    }
    public function createAdmin()
    {
        //Libros
        $libros = DB::select("select * from libros");
        //Capitulos
        $capitulos = DB::select("select * from capitulos");
        return view('pagina.formTable', compact('libros', 'capitulos'));
    }
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
        $datos = Pagina::findOrFail($id);
        return view('pagina.formTable', compact('datos', 'libros', 'capitulos'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAdmin($id)
    {
        $pag = Pagina::find($id);
        $id_capitulo = $pag->capitulo_id;
        $pag->delete();

        return redirect()->route('pagina.admin');
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $r, $id)
    {
        
        $pag = Pagina::find($id);
        if(isset($r->capitulo_id) && $r->capitulo_id!= null){
            $capitulo_id = $r->capitulo_id;
        }else{
            $capitulo_id = Session::get('capitulo_id');
        }
        
        $pag->numero_pagina = $r->numero_pagina;
        $pag->texto = $r->texto;

        
        $pag->capitulo_id = $capitulo_id;

        $pag->save();

        
        return redirect()->route('pagina.admin');
        
        
    }
}
