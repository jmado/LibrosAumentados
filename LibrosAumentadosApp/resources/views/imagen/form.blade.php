@extends("../layouts.master")

@section("content")
    

    
    @isset($datos)
        <form action="/imagen/{{$datos->id}}" method="POST" enctype='multipart/form-data'>
        @method("PUT")
    @else
        <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data">
    @endisset
        @csrf


        Capitulo:
        <select name="capitulo_id" required>
            @foreach ($capitulos as $capitulo)
                @isset($datos->capitulo_id)
                    <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option>     
                @else    
                    <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                @endisset   
            @endforeach
        </select>
        <br>
        Galeria:
        <select name="galeria_id">
            @foreach ($galerias as $galeria)
                <option value={{$galeria->id}}>{{$galeria->titulo}}</option>    
            @endforeach
        </select>
        <br>
        Titulo:
        <input type="text" name="titulo" value="{{$datos->titulo ?? ''}}" required><br>
        Descripcion:
        <input type="text" name="descripcion" value="{{$datos->descripcion ?? ''}}"><br>
        Imagen:
        <input type="file" name="imagen"><br>
            <img src="{{$datos->imagen ?? ''}}" class="cubierta-mini"><br>
        <input type="submit">
        <br>
        </form>
        <br>

        
@endsection