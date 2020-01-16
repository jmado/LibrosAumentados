@extends("layouts.master")

@section("content")
<a href="{{ route('libro.create') }}">Nuevo</a><br>
    <div class="box">
        @foreach ($libroList as $libro)
            
            <div class="row">    
                <div class="col">
                    <p><a href='{{route('capitulo.mostrarCapitulosLibro', ['id_book'=>$libro->id])}}'><img src='{{$libro->cubierta}}' class="cubierta"></a></p>
                </div>
            {{--<p>
                <a href='{{route('capitulo.show', ['id'=>$libro->capitulo])}}'>
                <a href='/capitulo/{{$libro->capitulo}}'>
                    <img src='{{$libro->cubierta}}' class="cubierta">
                </a>
            </p>--}}
                <div class="col"> 
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
            </div>
        @endforeach
        </div>
    @endsection