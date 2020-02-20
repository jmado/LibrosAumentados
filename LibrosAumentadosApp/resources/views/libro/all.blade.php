@extends("layouts.master")

@section("content")

<section class="text-center">
    <div class="container">
        <h1>Libros</h1>
        <p>
            @auth
                <a href="{{ route('libro.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Libro</a>      
            @endauth
        </p>
    </div>
</section>

    <div class="elementos container">
    {{ $libroList->links() }}
        <div class="row">


            @foreach ($libroList as $libro)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                    <p>
                        @if (Auth::check())
                            <a href="{{ route('capitulo.all', $libro->id) }}"><img src='{{$libro->cubierta}}' class="cubierta"></a> 
                        @else
                            <a href="/libro/loginVisitante/{{$libro->id}}"><img src='{{$libro->cubierta}}' class="cubierta"></a>
                        @endif



                       {{--<a href="{{route('libro.login', ['id_libro'=>$libro->id])}}"><img src='{{$libro->cubierta}}' class="cubierta"></a>--}}
                    </p>
                    
                    </div>
                    <div class="elemento-body">
                        <h3>Titulo: {{$libro->titulo}}</h3>
                        <h5>Subtitulo: {{$libro->subtitulo}}</h5>
                        <p>Autor: {{$libro->autor}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            {{--     <a href='{{route('libro.loginVisitante', ['id_libro'=>$libro->id])}}' class="btn btn-sm btn-info" role="button">Ver</a>--}}
                            @auth
                                <a href="{{route('libro.edit', $libro->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('libro.delete', $libro->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                            @endauth
                            </div>
                        </div>

                    </div>
                </div>
            </div>  
            @endforeach


        </div>
       
    </div>    





@endsection
