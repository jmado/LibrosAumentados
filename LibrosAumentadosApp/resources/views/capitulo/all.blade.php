@extends("layouts.master")

@section("content")
    <a href="{{ route('libro.create') }}">Nuevo</a>
    <div class="capitulos">
        @foreach ($capituloList as $capitulo)
            <div class="capitulo">
                <p>Capitulo {{$capitulo->capituloList}}</a></p>
            </div>
        @endforeach
    </div>