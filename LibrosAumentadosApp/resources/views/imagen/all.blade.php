@extends("layouts.master")



@section("content")
    <a href="{{ route('imagen.create') }}">Nueva Imagen</a><br>
    <div class="todas">
        @foreach ($imagenes as $imagen)
            <div class="elemento"> 
                <div class="enlace">
                    <a href="capitulo">Capitulo: {{$imagen->capitulo_id}}</a>
                </div>
                <div class="imagen">
                    <p><a href='{{$imagen->imagen}}'><img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}"></a></p>
                </div>    
                <div class="descripcion">
                    <p>Descripcion: {{$imagen->descripcion}}</p>
                </div>
            </div>
        @endforeach
        </div>
@endsection