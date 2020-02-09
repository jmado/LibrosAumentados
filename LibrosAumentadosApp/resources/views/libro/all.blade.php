@extends("layouts.master")

@section("content")

<section class="text-center">
    <div class="container">
        <h1>Libros</h1>
        <p>
          <a href="{{ route('libro.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Libro</a>
        </p>
      </div>
</section>

    <div class="elementos container">
        <div class="row">


            @foreach ($libroList as $libro)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                    <p>
                        <a href="{{route('capitulo.all', ['id'=>$libro->id])}}"><img src='{{$libro->cubierta}}' class="cubierta"></a>
                    </p>
                    
                    </div>
                    <div class="elemento-body">
                        <h3>Titulo: {{$libro->titulo}}</h3>
                        <h5>Subtitulo: {{$libro->subtitulo}}</h5>
                        <p>Autor: {{$libro->autor}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href='{{route('capitulo.all', ['id'=>$libro->id])}}' class="btn btn-sm btn-info" role="button">Ver</a>
                                <a href="{{route('libro.edit', $libro->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('libro.delete', $libro->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>  
            @endforeach


        </div>
    </div>    
</div> 


@endsection
