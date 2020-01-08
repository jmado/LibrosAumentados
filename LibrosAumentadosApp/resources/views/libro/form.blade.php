@extends("../layouts.master")

@section("content")
    @isset($libro)
        <form action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        Titulo:
        <input type="text" name="titulo" value="{{$libro->titulo ?? ''}}" required><br>
        Autor:
        <input type="text" name="autor" value="{{$libro->autor ?? ''}}" required><br>
        Subtitulo:
        <input type="subtitulo" name="subtitulo" value="{{$libro->subtitulo ?? ''}}"><br>
        Cubierta:
        <input type="file" name="cubierta"><br>
        <img src="{{$libro->portada ?? ''}}" class="cubierta-mini"><br>

        <input type="submit">
        <br>
        </form>
        <br>
@endsection