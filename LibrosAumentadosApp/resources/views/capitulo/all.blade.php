@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <h1>Capitulos</h1>
        <p>
          <a href="{{ route('libro.index') }}" class="btn btn-primary btn-lg" role="button">Ver Libros</a>
        </p>
        <p>
            @auth
                <a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Capitulo</a>
            @endauth
        </p>
      </div>
</section>

<section class="elementos container">
    {{ $capituloList->links() }}
    <div class="row">
    <h2>Lista de capitulos de {{$capituloList}}</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Capitulo</th>
                        <th>Titulo</th>
                        <th></th> 
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capituloList ?? '' as $capitulo)
                    <tr>
                        <td>
                            {{$capitulo->numero_orden}}: {{$capitulo->titulo}}
                        </td>
                        <td>
                            {{$capitulo->titulo}}
                        </td>
                    </tr>
                    <tr>
                        <th><a href="{{ route('imagen.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/imagen.png') }}" alt="">
                        </a></th> 
                        <th><a href="{{ route('galeria.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/galeria.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('audio.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/audio.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('video.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/video.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('modelo.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/modelo.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('descarga.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/descargas.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('pagina.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/pagina.png') }}" alt="">
                        </a></th>

                        <td>
                            @auth
                                <a href="{{route('capitulo.edit', $capitulo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('capitulo.delete', $capitulo->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                            @endauth
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
        </div>
</div>    



@endsection


