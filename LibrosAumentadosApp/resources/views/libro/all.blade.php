@extends("layouts.master")

@section("content")
    <div class="box">
    <a href="{{ route('libro.create') }}" class="badge badge-primary">Nuevo</a><br>

    @foreach ($libroList as $libro)        
        <br>
        <div class="row">    
            <div class="col">
                <p><a href='{{route('capitulo.mostrarCapitulosLibro', ['id_book'=>$libro->id])}}'><img src='{{$libro->cubierta}}' class="cubierta"></a></p>
            </div>
            <div class="col"> 
                <p>Titulo: {{$libro->titulo}}</p>
                <p>Subtitulo: {{$libro->subtitulo}}</p>
                <p>Autor: {{$libro->autor}}</p>
                <form action = "{{route('libro.edit', $libro->id)}}" method="POST">
                    @csrf
                    @method("GET")
                    <input type="submit" value="Editar">
                </form>
                <form action = "{{route('libro.destroy', $libro->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </div>
        </div>
    @endforeach
    </div>
@endsection