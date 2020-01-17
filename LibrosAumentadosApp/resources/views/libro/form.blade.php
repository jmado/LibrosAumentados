@extends("../layouts.master")

@section("content")
<div class="box">
    @isset($libro)
        <form action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        <div class="row">
            <div class="col-md-6">
                <br>
                Titulo: <br>
                <input type="text" name="titulo" value="{{$libro->titulo ?? ''}}" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <br>
                Autor: <br>
                <input type="text" name="autor" value="{{$libro->autor ?? ''}}" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <br>
                Subtitulo: <br>
                <input type="text" name="subtitulo" value="{{$libro->subtitulo ?? ''}}"><br>
            </div>
        </div>
        <div class="box">
            <div class="col-md-6">
                <br>
                Cubierta: <br>
                <input type="file" name="cubierta"><br>
            </div>
        </div>
        <img src="{{$libro->portada ?? ''}}" class="cubierta-mini"><br>

        <input type="submit">
        <br>
        </form>
        <br>
</div>
@endsection