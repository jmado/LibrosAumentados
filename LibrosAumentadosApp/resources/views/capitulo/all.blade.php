@extends("layouts.master")

@section("content")
    <div class="box">    
    <a href="{{ route('libro.create') }}" class="badge badge-primary">Nuevo</a><br>
        @foreach ($capituloList as $capitulo)
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('pagina.mostrarPaginaCapitulo', ['id_capitulo'=>$capitulo->id])}}">Capitulo {{$capitulo->numero_orden}}: {{$capitulo->titulo}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <form action="{{route('capitulo.edit', $capitulo->id)}}" method="POST">
                        @csrf
                        @method("GET")
                        <input type="submit" value="Editar">
                    </form>
                </div>
                <div class="col-md-2">
                    <form action="{{route('capitulo.destroy', $capitulo->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        @endforeach
        
    </div>
@endsection