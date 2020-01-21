@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <h1>Galerias</h1>
        <p>
          <a href="{{ route('galeria.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Galeria</a>
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
        <div class="row">


            @foreach ($galerias as $galeria)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <a href="{{route('galeria.show', $galeria->id)}}">
                            {{--<img src="{{$galeria->imagen}}" alt="{{$galeria->titulo}}">--}}
                        </a> 
                    </div>
                    <div class="elemento-body">
                        <h3>{{$galeria->titulo}}</h3>
                        <p><a href="{{route('capitulo.index')}}" class="btn btn-sm btn-primary" role="button">Capitulo: {{$galeria->capitulo_id}}</a></p>
                        <p>Descripcion: {{$galeria->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('galeria.show', $galeria->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a>
                                <a href="{{route('galeria.edit', $galeria->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('galeria.delete', $galeria->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
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

