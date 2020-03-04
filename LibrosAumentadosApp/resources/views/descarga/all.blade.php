@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <a href="{{ route('capitulo.all', $libro_id) }}">Capitulo</a>
        <h1>Descargas</h1>
        <p>
          <a href="{{ route('descarga.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo archivo</a>
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
    {{ $datos->links() }}
        <div class="row">

        
            @foreach ($datos as $dato)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <a href="{{route('descarga.show', $dato->id)}}">
                            {{--<img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}">--}}
                        </a> 
                    </div>
                    <div class="elemento-body">
                        <h2>{{$dato->titulo}}</h2>
                        <p>
                            <a href="{{route('capitulo.index')}}">Capitulo: {{$dato->capitulo_id}}</a>
                        </p>
                        <p>Descripcion: {{$dato->descripcion}} </p>
                        <p>Tipo de archivo: {{$dato->tipo_archivo}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('descarga.show', $dato->id)}}" class="btn btn-sm btn-outline-primary" role="button">Ver</a>
                                @auth
                                    <a href="{{route('descarga.edit', $dato->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>
                                    
                                    
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

                                            location.href='{{route('descarga.delete', $dato->id)}}'; 
                                            
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