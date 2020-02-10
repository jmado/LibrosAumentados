@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <a href="{{ route('capitulo.all', $id) }}">Capitulo</a>
        <h1>Imagenes</h1>
        <p>
          <a href="{{ route('imagen.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Imagen</a>
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
    {{ $datos->links() }}
        <div class="row">

        
            @foreach ($datos as $imagen)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <a href="{{route('imagen.show', $imagen->id)}}">
                            <img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}">
                        </a> 
                    </div>
                    <div class="elemento-body">
                        <h2>{{$imagen->titulo}}</h2>
                        <p><a href="{{route('capitulo.index')}}">Capitulo: {{$imagen->capitulo_id}}</a></p>
                        <p>Descripcion: {{$imagen->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('imagen.show', $imagen->id)}}" class="btn btn-sm btn-outline-primary" role="button">Ver</a>
                                <a href="{{route('imagen.edit', $imagen->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>
                                <a href="{{route('imagen.delete', $imagen->id)}}" class="btn btn-sm btn-outline-danger" role="button">Borrar</a>
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