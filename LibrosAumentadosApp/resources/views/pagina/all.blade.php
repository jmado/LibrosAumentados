@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item"><a href="{{ route('capitulo.all', $id) }}">Capitulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Páginas</li>
            </ol>
        </nav>
        <h1>Páginas</h1>
        <p>
          <a href="{{ route('pagina.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Pagina</a>
        </p>
      </div>
</section>




<div class="elementos container">
    <div class="row">
        <h2>Capitulo: {{$numero_orden[0]->numero_orden}} Lista de páginas</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                  
                        
                        <th>Página</th>
                        <th>Texto</th>  
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginaList as $pagina)
                    <tr>
                        <td>
                            {{$pagina->numero_pagina}}
                        </td>
                        <td>
                            <details>
                                <summary>Texto de la página {{$pagina->numero_pagina}}</summary>
                                <p>
                                {!!html_entity_decode($pagina->texto)!!}
                                </p>
                            </details>
                        </td>
                        <td>
                            <a href="{{route('pagina.edit', $pagina->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>   
                        </td>
                        <td>
                        <a onclick="borrar()" class="btn btn-sm btn-outline-danger" role="button">Borrar</a>

                            <script>
                            function borrar(){
                                swal({
                                    title: "¿Seguro de que borrar este elemento?",
                                    text: "Una vez eliminado, ¡no podrá recuperar este elemento!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                    if (willDelete) {
                                        swal("Poof! Ha sido borrado!", {
                                        icon: "success",
                                        });

                                    location.href='{{route('pagina.delete', $pagina->id)}}'; 
                                    
                                    } else {
                                        swal("¡Su elemento está a salvo!");
                                    }
                                }); 
                                
                            }
                            
                            </script>
                        </td>
                    </tr>  
                    @endforeach
                    {{ $paginaList->links() }}
                </tbody>
        </div>
</div>



@endsection





