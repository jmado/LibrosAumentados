@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <h1>Libros</h1>
        <p>
          <a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Capitulo</a>
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
        <div class="row">


            @foreach ($capituloList as $capitulo)  
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-img">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('pagina.mostrarPaginaCapitulo', ['id_capitulo'=>$capitulo->id])}}">Capitulo {{$capitulo->numero_orden}}: {{$capitulo->titulo}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="elemento-body">
                        <h3>Titulo: {{$capitulo->titulo}}</h3>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {{--
                                    <a href="{{route('capitulo.show', $capitulo->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a>
                                --}}
                                <a href="{{route('capitulo.edit', $capitulo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('capitulo.delete', $capitulo->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
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


