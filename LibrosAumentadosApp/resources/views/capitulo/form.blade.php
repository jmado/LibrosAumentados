@extends("../layouts.master")

@section("content")
    <div class="box">
        
            @isset($capitulo)
                <form action="{{ route('capitulo.update', ['capitulo' => $capitulo->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
                @method("PUT")
            @else
                <form action="{{ route('capitulo.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
            @endisset
                @csrf
                <div class="row">
                    <!--<div class="col-md-3"></div>-->
                    <div class="col-md-6">
                        <br>
                        Numero de capítulo: <br>
                        <input type="text" name="numero_orden" value="{{$capitulo->numero_orden ?? ''}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Título: <br>
                        <input type="text" name="titulo" value="{{$capitulo->titulo ?? ''}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Capitulo padre: <br>
                        <input type="text" name="capitulo_padre" value="{{$capitulo->capitulo_padre_id ?? ''}}"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        ID Libro: <br>
                        <input type="text" name="libro_id" value="{{$capitulo->libro_id ?? ''}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <br><input type="submit" value="Editar">
                    </div>
                </div>
                    <div class="col-md-1"></div>
                </form>
        
    </div>
@endsection
        