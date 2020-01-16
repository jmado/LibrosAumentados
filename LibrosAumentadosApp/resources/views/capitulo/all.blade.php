@extends("layouts.master")

@section("content")
    <a href="{{ route('libro.create') }}">Nuevo</a>
    <div class="capitulos">
        <ul>
        @foreach ($capituloList as $capitulo)
            <div class="capitulo">
                <li><a href="{{route('pagina.mostrarPaginaCapitulo', ['id_capitulo'=>$capitulo->id])}}">Capitulo {{$capitulo->numero_orden}}: {{$capitulo->titulo}}</a></li>
            </div>
        <form action="{{route('capitulo.edit', $capitulo->id)}}" method="POST">
            @csrf
            @method("GET")
            <input type="submit" value="Editar">
        </form>
        <form action="{{route('capitulo.destroy', $capitulo->id)}}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" value="Borrar">
        </form>
        @endforeach
    </ul>
    </div>