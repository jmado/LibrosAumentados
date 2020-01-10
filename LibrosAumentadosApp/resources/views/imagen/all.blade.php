@extends("layouts.master")



@section("content")
    <a href="{{ route('imagen.create') }}">Nueva Imagen</a><br>
    <div class="todas">
        @foreach ($datos as $imagen)
            <div class="elemento"> 
                <div class="enlace">
                    <a href="{{route('capitulo.mostrarCapituloLibro',['id_book'=>$imagen->capitulo_id]')}}">Capitulo: {{$imagen->capitulo_id}}</a>
                </div>
                <div class="imagen">
                    <p><a href="{{route('imagen.show', $imagen->id)}}"><img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}"></a></p>
                </div>    
                <div class="modificar">
                    <a href="{{route('imagen.edit', $imagen->id)}}" class="btn_modificar">Modificar</a>
                </div>
                <div class="borrar">
                    <a href="{{route('imagen.delete', $imagen->id)}}" class="btn_borrar">Borrar</a>
                </div>
            </div>
        @endforeach
        </div>
@endsection