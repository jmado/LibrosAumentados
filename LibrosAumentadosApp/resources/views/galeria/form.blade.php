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



<div class="container ">
    <div class="form">
        @isset($galeria)
            <form action="{{ route('galeria.update', ['galerium' => $galeria->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
            @method("PUT")
        @else
            <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @endisset
            @csrf

            <label for="capitulo">Capitulos:</label>
            <select name="capitulo_id" class="form-control" id="capitulo" required>
                @foreach ($capitulos as $capitulo)
                @isset($datos)
                    @if($datos->capitulo_id == $capitulo->id)
                        <option value={{$capitulo->id}} selected>{{$capitulo->titulo}}</option>    
                    @else   
                        <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                    @endif
                @else   
                    <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                @endisset
                @endforeach
            </select>
            
            <label for="title">Titulo:</label>
            <br>
            <input id="title" type="text" name="titulo" class="form-control" value="{{$galeria->titulo ?? ''}}" required>
            <br>
            <label for="info">Descripción:</label>
            <br>
            <input id="info" type="text" name="descripcion" value="{{$datos->descripcion ?? ''}}" required>
            <br>
            <label for="type">Tipo</label>
            <br>
            <select class="custom-select" id="type" name="tipo">
                <option value="normal">Normal</option>
                <option value="transparencia">Transparente</option>
            </select>
            <br>

            <label for="img">Imagenes</label>
            <select id="img" name="imagenes_id[]" class="form-control" multiple>
                @foreach ($imagenes as $imagen)
                    @isset($galeria)
                        @if($galeria->imagenes()->get()->contains($imagen->id))
                            <option value={{$imagen->id}} selected>{{$imagen->id}}</option>    
                        @else   
                            <option value={{$imagen->id}}>{{$imagen->id}}</option> 
                        @endif
                        @else   
                            <option value={{$imagen->id}}>{{$imagen->id}}</option> 
                    @endisset
                @endforeach
            </select>

            {{-- 
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="fichero" lang="es">
                <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
            </div>
            --}}

            <input type="submit" value="Enviar" class="btn btn-primary " role="button">

            </form>

    </div>    
</div>

@endsection





  

