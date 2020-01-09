@extends("../layouts.master")

@section("content")
    @isset($capitulo)
        <form action="{{ route('capitulo.update', ['capitulo' => $capitulo->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        Numero de capítulo:
        <input type="text" name="numero_capitulo" value="{{$capitulo->numero_capitulo}}" required><br>
        Título:
        <input type="text" name="titulo" value="{{$capitulo->titulo}}" required><br>
        