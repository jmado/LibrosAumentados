@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <h1>Galerias</h1>
        <p>
          <a href="{{route('galeria.index')}}" class="btn btn-primary btn-lg" role="button">Ver Galerías</a>
        </p>
      </div>
</section>


<div class="elementos">
    <div class="container">
        <div class="row">
            
                    @foreach ($imagenes as $imagen)
                    <div class="col-sm-2 imagen_galeria">
                        <div class="img">
                            <img src="/{{$imagen->imagen}}">
                        </div>
                    </div>   
                    @endforeach
                    
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="elemento-body">

                    <p>Titulo: {{$galeria[0]->titulo}}</p>
                    <p>Descripción: {{$galeria[0]->descripcion}}</p>
                    <p>Tipo de galería: {{$galeria[0]->tipo}}</p>
                    <p>Capitulo: {{$galeria[0]->capitulo_id}}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{route('galeria.edit', $galeria[0]->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                            <a href="{{route('galeria.delete', $galeria[0]->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>    
</div>

            



@endsection