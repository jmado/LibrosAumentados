@extends("../layouts.master")

@section("content")
<a href="{{route('libro.create') }}">Nueva</a><br>
    <div class="box">
        @foreach ($paginaList as $pagina)

            <div class="row">
                <div class="col">
                    <p>Página {{$pagina->numero_pagina}}</p>
                    <p>{{$pagina->texto}}</p>
                    
                    <form action="{{route('pagina.edit', $pagina->id)}}" method="POST">
                        @csrf
                        @method("GET")
                        <input type="submit" value="Editar">
                    </form>
                    <form action="{{route('pagina.destroy', $pagina->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </div>
            </div>
            
        @endforeach
    </div>