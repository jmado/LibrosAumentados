@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </div>
</section>

<div class="container ">
    <div class="form">
        @isset($datos)
            <form action="/modelo/{{$modelo->id}}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
        @else
            <form action="{{ route('modelo.store') }}" method="POST" enctype="multipart/form-data">
        @endisset
            @csrf
            
            <label for="capitulo">Capitulos:</label>
            <input type="text" name="capitulo_id" class="form-control" id="capitulo" value="{{$modelo->capitulo_id ?? ''}}">
           
            <label for="title">Titulo:</label>
            <input id="title" type="text" name="titulo" class="form-control" value="{{$modelo->titulo ?? ''}}" required>
           
            <label for="info">Descripción:</label>
            <input id="info" type="text" name="descripcion" class="form-control" value="{{$modelo->descripcion ?? ''}}">
           
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="fichero" lang="es">
                <label class="custom-file-label" for="fichero">Seleccionar Archivo .ZIP</label>
            </div>
            <br>
            

            <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">

            </form>

    </div>    
</div>

@endsection