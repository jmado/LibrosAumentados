
@extends("../layouts.master")

@section("content")

<section class="text-center">
    <div class="container">    
        <button class="btn btn-primary " role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </div>
</section>


<div class="container">
    <div class="form">
        @isset($libro)
            <form action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
        @else
            <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @endisset
            @csrf
                <br>
                <label for="title">Titulo:</label>
                <br>
                <input id="title" type="text" name="titulo" value="{{$libro->titulo ?? ''}}" required>
                <br>
                <label for="author">Autor:</label>
                <br>
                <input id="author" type="text" name="autor" value="{{$libro->autor ?? ''}}" required>
                <br>
                <label for="sub">Subtitulo:</label>
                <br>
                <input id="sub" type="text" name="subtitulo" value="{{$libro->subtitulo ?? ''}}">
                <br>
                <div class="custom-file">
                    <input type="file" name="cubierta" class="custom-file-input" id="fichero" lang="es">
                    <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
                </div>
                <img src="{{$libro->portada ?? ''}}" class="cubierta-mini">

                <input type="submit" value="Enviar" class="btn btn-primary " role="button">

            </form>
    </div>    
</div>

@endsection

