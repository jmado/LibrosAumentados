
@extends("../layouts.master")

@section("content")

<div class="container p-5">
    <section class="text-center">
        <div class="container">    
            <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atrás</button>
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
                    <label for="title">Título:</label>
                    <input id="title" type="text" class="form-control" name="titulo" value="{{$libro->titulo ?? ''}}" required>
                </div>
                    
                <div class="form-group">
                    <label for="author">Autor:</label>  
                    <input id="author" type="text" class="form-control" name="autor" value="{{$libro->autor ?? ''}}" required>
                </div>  
                
                <div class="form-group">
                    <label for="sub">Subtítulo:</label>
                    <input id="sub" type="text" class="form-control" name="subtitulo" value="{{$libro->subtitulo ?? ''}}" required>
                </div>  

                <div class="custom-file">
                        <input type="file" class="form-control" name="cubierta" class="custom-file-input" id="fichero" lang="es">
                        <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
                </div>  

                    
                <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">

            </form>
                
                
            
    </div>
</div>


@endsection

