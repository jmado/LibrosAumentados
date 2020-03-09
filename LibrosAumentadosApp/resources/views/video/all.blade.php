@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('capitulo.all', $libro_id) }}">Capitulos</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page">Videos</li>
            </ol>
        </nav>
        <h1>Videos</h1>
        @auth
        <p>
          <a href="{{ route('video.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Video</a>
        </p>
        @endauth
      </div>
</section>

<div class="elementos">
    <div class="container">
    {{ $datos->links() }}
        <div class="row">

        
            @foreach ($datos as $video)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <a href="{{route('video.show', $video->id)}}">
                            <img src="{{$video->video}}" alt="{{$video->titulo}}">
                        </a> 
                    </div>
                    <div class="elemento-body">
                        <h2>{{$video->titulo}}</h2>
                        <p><a href="{{route('capitulo.index')}}">Capitulo: {{$video->capitulo_id}}</a></p>
                        <p>Descripcion: {{$video->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('video.show', $video->id)}}" class="btn btn-sm btn-outline-primary" role="button">Ver</a>
                                @auth
                                    <a href="{{route('video.edit', $video->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>
                                    
                                    
                                    <a class="b{{$video->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>

                                    <script>
                                    $(document).ready(function(){ 
                                        var borrar = $(".b{{$video->id}}").click(function(){
                                            var id = {{$video->id}};
                                            var direccion = "{{route('video.delete', 0)}}";
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
                                @endauth
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