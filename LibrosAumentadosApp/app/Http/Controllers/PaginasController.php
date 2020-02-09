<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $paginaList = Pagina::where('capitulo_id', '=', $id)->get();
        return view('pagina.all', compact('paginaList'));
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
       
        
        $pag = new Pagina($r->all());

        $pag->save();
        $pag->capitulo()->associate($r->capitulo_id);
        return redirect()->route('pagina.all', $r->capitulo_id);
        
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
        $pag->numero_pagina = $r->numero_pagina;
        $pag->texto = $r->texto;
        $pag->capitulo_id = $r->capitulo_id;

        $pag->save();

        return redirect()->route('capitulo.all', $pag->capitulo_id);
        
        
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

        return redirect()->route('capitulo.all', $id_capitulo);
    }
}
