@extends("layouts.master")

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
        @isset($capitulo)
            <form action="{{ route('capitulo.update', ['capitulo' => $capitulo->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
            @method("PUT")
        @else
            <form action="{{ route('capitulo.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @endisset
            @csrf
                <br>
                <label for="capitulo">Capitulos:</label>
                <br>
                <input id="capitulo" type="text" name="numero_orden" value="{{$capitulo->numero_orden ?? ''}}" required>
                <br>
                <label for="title">Capitulos:</label>
                <br>
                <input id="title" type="text" name="titulo" value="{{$capitulo->titulo ?? ''}}" required>
                <br>
                <label for="cap">Capitulo padre:</label>
                <br>
                <input id="cap" type="text" name="capitulo_padre" value="{{$capitulo->capitulo_padre_id ?? ''}}">
                <br>
                <label for="libro">Libro id:</label>
                <br>
                <input id="libro" type="text" name="libro_id" value="{{$capitulo->libro_id ?? ''}}" required>
                <br>

                <input type="submit" value="Enviar" class="btn btn-primary " role="button">

            </form>
    </div>    
</div>

@endsection


        