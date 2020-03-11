@extends("layouts.master")

@section("content")


<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">LibrosAumentadosApp</a></li>
                    <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                    <li class="breadcrumb-item active " aria-current="page">Capitulos</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-2">
            <img src="{{ url($libro->cubierta) }}" alt="Cubierta del libro: {{$libro->titulo}}">
        </div>
        <div class="col-10">
            <div class="row">
                {{$libro->titulo}}
            </div>
            <div class="row">
                {{$libro->subtitulo}}
            </div>
            <div class="row">
                {{$libro->autor}}
            </div>
        </div>
    </div>
    @auth
    <div class="row mt-5 mb-5">
        <div class="col">
            <a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg" role="button">
                <i class="fas fa-plus"></i> Añadir capitulo
            </a>
        </div>
    </div>
    @endauth

    @foreach ($capituloList as $capitulo)
    <div class="row border rounded p-2">
        <div class="col">
            <div class="row text-center p-1">
                <div class="col">
                    {{$capitulo->numero_orden}} - {{$capitulo->titulo}}
                </div>
            </div>
            <div class="row p-1">
                <div class="col">
                    <a href="{{ route('imagen.all', $capitulo->id) }}" data-toggle="tooltip" title="Imagenes">
                        <i class="far fa-image"></i>
                    </a> 
                </div>
                <div class="col">
                    <a href="{{ route('galeria.all', $capitulo->id) }}" data-toggle="tooltip" title="Galerias">
                        <i class="far fa-images"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('audio.all', $capitulo->id) }}" data-toggle="tooltip" title="Audios">
                        <i class="fas fa-volume-up"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('video.all', $capitulo->id) }}" data-toggle="tooltip" title="Videos">
                        <i class="fas fa-video"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('modelo.all', $capitulo->id) }}" data-toggle="tooltip" title="Modelos 3d">
                        <i class="fas fa-cube"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('descarga.all', $capitulo->id) }}" data-toggle="tooltip" title="Descargas">
                        <i class="fas fa-file-download"></i>
                    </a>
                </div>
                @auth
                <div class="col">
                    <a href="{{ route('pagina.all', $capitulo->id) }}" data-toggle="tooltip" title="Paginas">
                        <i class="far fa-file-alt"></i>
                    </a>
                </div>
                @endauth
                    <script>
                        $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                        });
                    </script>
            </div>
        </div>
    </div>
    @auth
    <div class="row">
        <div class="col p-1">
            <a href="{{route('capitulo.edit', $capitulo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
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

    @endforeach
</div>

@endsection


    


