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


<div class="container">
    
        @isset($capitulo)
        <form action="{{ route('capitulo.update', ['capitulo' => $capitulo->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
            @method("PUT")
        @else
        <form action="{{ route('capitulo.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @endisset
            @csrf
<<<<<<< Updated upstream
            <div class="form-group">
                <label for="capitulo">Capitulos:</label>
                <input id="capitulo" type="text" class="form-control" name="numero_orden" value="{{$capitulo->numero_orden ?? ''}}" required>
            </div>
                
            <div class="form-group">
                <label for="title">Titulo:</label>    
                <input id="title" type="text" class="form-control" name="titulo" value="{{$capitulo->titulo ?? ''}}" required>
            </div>
            
            <div class="form-group">
=======
                <br>
                <label for="capitulo">Nº de capitulo:</label>
                <br>
                <input id="capitulo" type="text" name="numero_orden" value="{{$capitulo->numero_orden ?? ''}}" required>
                <br>
                <label for="title">Nombre:</label>
                <br>
                <input id="title" type="text" name="titulo" value="{{$capitulo->titulo ?? ''}}" required>
                <br>
>>>>>>> Stashed changes
                <label for="cap">Capitulo padre:</label>
                <input id="cap" type="text" class="form-control" name="capitulo_padre" value="{{$capitulo->capitulo_padre_id ?? ''}}">
            </div>

            <div class="form-group">
                <label for="libro">Libro id:</label>
                <input id="libro" type="text" class="form-control" name="libro_id" value="{{$capitulo->libro_id ?? ''}}" required>
            </div>

            <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">

        </form>
      
</div>

@endsection


        