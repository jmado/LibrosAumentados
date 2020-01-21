@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <h1>Bienvenido a LibrosAumentados</h1>
        <p class="lead text-muted">Descripción del proyecto / página web que estas visitando.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">I.E.S CELIA VIÑAS</a>
          <a href="#" class="btn btn-secondary my-2">Otros</a>
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
        <div class="row">


            @foreach ($libroList as $libro)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <p><a href='{{route('capitulo.mostrarCapitulosLibro', ['id_book'=>$libro->id])}}'><img src='{{$libro->cubierta}}' class="cubierta"></a></p>
                    </div>
                    <div class="elemento-body">
                        <h2>Titulo: {{$libro->titulo}}</h2>
                        <p>Autor: {{$libro->autor}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">Borrar</button>
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