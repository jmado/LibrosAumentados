
@extends("../layouts.master")

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


<div class="container">
        @isset($libro)
        <form action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
        @else
        <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @endisset
            @csrf

            <div class="form-group">
                <label for="title">Titulo:</label>
                <input id="title" type="text" class="form-control" name="titulo" value="{{$libro->titulo ?? ''}}" required>
            </div>
                
            <div class="form-group">
                <label for="author">Autor:</label>  
                <input id="author" type="text" class="form-control" name="autor" value="{{$libro->autor ?? ''}}" required>
            </div>  
            
            <div class="form-group">
                <label for="sub">Subtitulo:</label>
                <input id="sub" type="text" class="form-control" name="subtitulo" value="{{$libro->subtitulo ?? ''}}">
            </div>  

            <div class="custom-file">
                    <input type="file" class="form-control" name="cubierta" class="custom-file-input" id="fichero" lang="es">
                    <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
            </div>  

<<<<<<< HEAD
            {{--<div class="form-group">
                <img src="{{$libro->portada ?? ''}}" class="cubierta-mini">
            </div>  
                --}}
=======
             
                
>>>>>>> master
                
            <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">

        </form>
            
            
        
</div>

@endsection

