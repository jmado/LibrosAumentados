@extends("../layouts.master")

@section("content")
    <div class="box">
    <a href="{{route('pagina.create') }}" class="badge badge-primary">Nueva</a><br>

        @foreach ($paginaList as $pagina)
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <p>Página {{$pagina->numero_pagina}}</p>
                    <p>{{$pagina->texto}}</p>
                </div>
                <div class="col-md-3">  
                    <form action="{{route('pagina.edit', $pagina->id)}}" method="POST">
                        @csrf
                        @method("GET")
                        <input type="submit" value="Editar">
                    </form>
                </div>
                <div class="col-md-2">
                    <form action="{{route('pagina.destroy', $pagina->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </div>
            </div> 
        @endforeach
    </div>
@endsection