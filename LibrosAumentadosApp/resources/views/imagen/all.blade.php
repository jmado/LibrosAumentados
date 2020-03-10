@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('capitulo.all', $libro_id) }}">Capitulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Imagenes</li>
            </ol>
        </nav>
        <h1>Imagenes</h1>
        
        <p>
            @auth
                <a href="{{ route('imagen.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Imagen</a>      
            @endauth
          
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
    {{ $datos->links() }}
        <div class="row">

        
            @foreach ($datos as $imagen)   
            <div class="col-md-6">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <a href="../../{{$imagen->imagen}}">
                            <img src="../../{{$imagen->imagen}}" alt="{{$imagen->titulo}}">
                        </a> 
                    </div>
                    <div class="elemento-body">
                        <h2>{{$imagen->titulo}}</h2>
                        {{--<p><a href="{{route('capitulo.index')}}">Capitulo: {{$imagen->capitulo_id}}</a></p>--}}
                        <p>Descripcion: {{$imagen->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @auth           
                                    <a href="{{route('imagen.edit', $imagen->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>



                                    <a class="b{{$imagen->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>

                                    <script>
                                    $(document).ready(function(){ 
                                        var borrar = $(".b{{$imagen->id}}").click(function(){
                                            var id = {{$imagen->id}};
                                            var direccion = "{{route('imagen.deleteConfirm', 0)}}";
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