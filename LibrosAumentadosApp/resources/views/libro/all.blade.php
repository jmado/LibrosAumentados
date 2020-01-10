@extends("layouts.master")

@section("content")

    <a href="{{ route('libro.create') }}">Nuevo</a><br>
    <div class="todas">
        @foreach ($libroList as $libro)
            
            <div class="libro">    
<<<<<<< Updated upstream
            <p><a href='{{route('capitulo.show', ['id'=>$libro->id])}}'><img src='{{$libro->cubierta}}' class="cubierta"></a></p>
=======
            <p>
                {{--<a href='{{route('capitulo.show', ['id'=>$libro->capitulo])}}'>--}}
                <a href='/capitulo/{{$libro->capitulo}}'>
                    <img src='{{$libro->cubierta}}' class="cubierta">
                </a>
            </p>
>>>>>>> Stashed changes
                <p>Titulo: {{$libro->titulo}}</p>
                <p>Subtitulo: {{$libro->subtitulo}}</p>
                {{--<p><a href="{{route('libro.edit', $libro->id)}}">Modificar</a></p>--}}
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
        @endforeach
        </div>
    @endsection