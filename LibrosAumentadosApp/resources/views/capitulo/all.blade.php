@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page">Capitulos</li>
            </ol>
        </nav>

        <h1>Capitulos</h1>
        
      </div>
</section>

<div class="container elementos">
    <div class="row">
        <div class="col">
            <h2>Lista de capitulos {{$capituloList}}</h2>
        </div>
        <div class="col">
            @auth
            <p><a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Capitulo</a></p>
            @endauth
        </div>
    </div>

    <div class="row">
        @foreach ($capituloList ?? '' as $capitulo)
        <div class="col-md-6">
            <div class="elemento-header">
            <p>Nº {{$capitulo->numero_orden}} - {{$capitulo->titulo}}</p>
                
                
            </div>
            <div class="elemento-body">
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('imagen.all', $capitulo->id) }}">
                            <i class="far fa-image"></i>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="{{ route('galeria.all', $capitulo->id) }}">
                            <i class="far fa-images"></i>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('audio.all', $capitulo->id) }}">
                            <i class="fas fa-volume-up"></i>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('video.all', $capitulo->id) }}">
                            <i class="fas fa-video"></i>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('modelo.all', $capitulo->id) }}">
                            <i class="fas fa-cube"></i>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('descarga.all', $capitulo->id) }}">
                            <i class="fas fa-file-download"></i>
                        </a>
                    </div>
                    @auth
                    <div class="col">
                        <a href="{{ route('pagina.all', $capitulo->id) }}">
                            <i class="far fa-file-alt"></i>
                        </a>
                    </div>
                    @endauth
                </div>

            @auth
                <div class="row">
                    <div class="col-6">
                        <a href="{{route('capitulo.edit', $capitulo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                    </div>
                    <div class="col-6">
                        <a class="b{{$capitulo->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>
                        <script>
                                    $(document).ready(function(){ 
                                        var borrar = $(".b{{$capitulo->id}}").click(function(){
                                            var id = {{$capitulo->id}};
                                            var direccion = "{{route('capitulo.deleteConfirm', 0)}}";
                                            direccion = direccion.replace("0", id);
                                            swal({
                                                title: "¿Seguro de que borrar este elemento?",
                                                text: "Una vez eliminado, ¡no podrá recuperar este elemento!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                                })
                                                .then((willDelete) => {
                                                if (willDelete) {
                                                    swal("El elemento se borrar si no tiene contenido", {
                                                    icon: "success",
                                                    });
                                                location.href=direccion; 
                                                } else {
                                                    swal("¡Su elemento está a salvo!");
                                                }
                                            }); 

                                        });
                                    });   
                        </script>
                    </div>               
                </div>
            @endauth

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection


    


