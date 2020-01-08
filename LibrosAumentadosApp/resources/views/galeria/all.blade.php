@extends("layouts.master")



@section("content")
    <a href="{{ route('galeria.create') }}">Nueva Galeria</a><br>
    <div class="todas">
        @foreach ($galerias as $galeria)
            <div class="elemento"> 
                <div class="enlace">
                    <a href="capitulo">Capitulo: {{$galeria->capitulo_id}}</a>
                </div>
                <div class="titulo">
                    <p>Titulo: {{$galeria->titulo}}</p>
                </div>    
                <div class="descripcion">
                    <p>Descripcion: {{$galeria->descripcion}}</p>
                </div>
                <div class="tipo">
                    <p>Tipo: {{$galeria->tipo}}</p>
                </div>
            </div>
        @endforeach
        </div>
@endsection