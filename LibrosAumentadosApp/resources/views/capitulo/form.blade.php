@extends("../layouts.master")

@section("content")

    @isset($capitulo)
        <form action="{{ route('capitulo.update', ['capitulo' => $capitulo->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('capitulo.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        Numero de capítulo:
        <input type="text" name="numero_orden" value="{{$capitulo->numero_orden ?? ''}}" required><br>
        Título:
        <input type="text" name="titulo" value="{{$capitulo->titulo ?? ''}}" required><br>
        Capitulo padre:
        <input type="text" name="capitulo_padre" value="{{$capitulo->capitulo_padre_id ?? ''}}"><br>
        ID Libro:
        <input type="text" name="libro_id" value="{{$capitulo->libro_id ?? ''}}" required><br>
        
        <input type="submit" value="Editar">
        <br>
        </form>
@endsection
        