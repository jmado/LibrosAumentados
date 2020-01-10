@extends("layouts.master")



@section("content")
    <a href="{{ route('imagen.index') }}">Imagenes</a><br>
            <div class="elemento"> 
                <div class="enlace">
                    <a href="capitulo">Capitulo: {{$datos->capitulo_id}}</a>
                </div>
                <div class="imagen">
                    <p><a href="../{{$datos->imagen}}"><img src="../{{$datos->imagen}}" alt="{{$datos->titulo}}"></a></p>
                </div>    
                <div class="descripcion">
                    <p>Descripcion: {{$datos->descripcion}}</p>
                </div>
                <div class="modificar">
                    <a href="{{route('imagen.edit', $datos->id)}}" class="btn_modificar">Modificar</a>
                </div>
                <div class="borrar">
                    <a href="{{route('imagen.delete', $datos->id)}}" class="btn_borrar">Borrar</a>
                </div>
            </div>
@endsection