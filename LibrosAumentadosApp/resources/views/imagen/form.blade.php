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


<div class="container ">
    <div class="form">
        @isset($datos)
            <form action="/imagen/{{$datos->id}}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
        @else
            <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data">
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

            <label for="galeria">Galerias:</label>
            <select id="galerias" name="galeria_id[]" class="form-control" id="galerias" multiple>
                @foreach ($galerias as $galeria)
                    @isset($datos)
                        @if($datos->galerias()->get()->contains($galeria->id))
                            <option value={{$galeria->id}} selected>{{$galeria->titulo}}</option>   
                        @else
                            <option value={{$galeria->id}}>{{$galeria->titulo}}</option>
                        @endif
                    @else
                        <option value={{$galeria->id}}>{{$galeria->titulo}}</option>
                    @endif 
                @endforeach
            </select>

            <br>
            <label for="title">Titulo:</label>
            <br>
            <input id="title" type="text" name="titulo" value="{{$datos->titulo ?? ''}}" required>
            <br>
            <label for="info">Descripción:</label>
            <br>
            <input id="info" type="text" name="descripcion" value="{{$datos->descripcion ?? ''}}">
            <br>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="fichero" lang="es">
                <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
            </div>
            <br>
            

            <input type="submit" value="Enviar" class="btn btn-primary " role="button">

            </form>

    </div>    
</div>

@endsection







        