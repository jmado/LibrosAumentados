<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Capitulo;

class CapitulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capituloList = Capitulo::all();
        return view('capitulo.all', compact('capituloList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('capitulo.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $cap = new Capitulo($r->all());
        $cap->numero_orden = $r->numero_orden;
        $cap->titulo = $r->titulo;
        $cap->capitulo_padre_id = $r->capitulo_padre_id;
        $cap->libro_id = $r->libro_id;
        
        $cap->save();
        return redirect()->route('capitulo.index');
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
        $capitulo = Capitulo::find($id);
        return view('capitulo.form');
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
        $cap = Capitulo::find($r->id);
        $cap->numero_orden = $r->numero_orden;
        $cap->titulo = $r->titulo;
        $cap->capitulo_padre_id = $r->capitulo_padre_id;
        $cap->libro_id = $r->libro_id;

        $cap->save();

        return redirect()->route('capitulo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cap = Capitulo::find($id);
        $cap->delete();

        return redirect()->route('capitulo.index');
    }
}
