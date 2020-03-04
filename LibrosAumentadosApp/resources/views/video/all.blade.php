@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <a href="{{ route('capitulo.all', $capitulo_id) }}">Capitulo</a>
        <h1>Videos</h1>
        <p>
          <a href="{{ route('video.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Video</a>
        </p>
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

                                            location.href='{{route('video.delete', $video->id)}}'; 
                                            
                                            } else {
                                                swal("¡Su elemento está a salvo!");
                                            }
                                        }); 
                                           
                                    }
                                       
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