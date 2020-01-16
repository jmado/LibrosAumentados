@extends("../layouts.master")

@section("content")

    @isset($pagina)
        <form action="{{ route('pagina.update', ['pagina' => $pagina->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('pagina.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        Texto:
        <input type="text" name="texto" value="{{$pagina->texto ?? ''}}"><br>
        Numero de pagina:
        <input type="text" name="numero_pagina" value="{{$pagina->numero_pagina ?? ''}}"><br>
        Id del Capitulo:
        <input type="text" name="capitulo_id" value="{{$pagina->capitulo_id ?? ''}}"><br>

        <input type="submit" value="Editar">
        <br>
        </form>
@endsection