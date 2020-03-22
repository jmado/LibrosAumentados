@extends("layouts.master")

@section("content")



<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">LibrosAumentadosApp</a></li>
                    <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                    <li class="breadcrumb-item text-primary"><a href="{{ route('capitulo.all', $libro_id) }}">Capitulos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galerias</li>
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
            <a href="{{ route('galeria.create', $capitulo) }}" class="btn btn-primary btn-lg" role="button">
                <i class="fas fa-plus"></i> Añadir Galeria
            </a>
        </div>
    </div>
    @endauth



    {{ $galerias->links() }}
<div class="table-responsive text-center">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th></th> 
                <th>Titulo</th>
                <th>Descripcion</th>
                <th></th>
                @auth
                <th></th>
                @endauth
            </tr>
        </thead>
    <tbody>
@foreach ($galerias as $galeria)
    
        <tr>
        
            <td class="cubierta_galeria">
                <a href="#" class="modal{{$galeria->id}}">
                    <img src="{{ url($galeria->cubierta) }}" alt="cubierta de la galeria" class="cubierta_galeria">
                </a>
                <script>
                    $(document).ready(function(){
                        var modal = $(".modal{{$galeria->id}}").click(function(){
                            var id = {{$galeria->id}};
                            var img = '{{ url($galeria->cubierta) }}';
                            var titulo = '{{$galeria->titulo}}';
                            var direccion = "{{route('galeria.show', 0)}}";
                            direccion = direccion.replace("0", id);
                            swal({
                                title: titulo,
                                content: {
                                    element: "img",
                                    attributes: {
                                    src: img,
                                    },
                                },
                                button: "Ver galeria",
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                    location.href=direccion; 
                                    } 
                                }); 
                        });
                    });
                </script>
                
            </td>
            <td>{{$galeria->titulo}}</td>
            <td>{{$galeria->descripcion}}</td>
            <td><a href="{{route('galeria.show', $galeria->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a></td>

            @auth 
            <td>
                <a href="{{route('galeria.edit', $galeria->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                <a href="#"  class="b{{$galeria->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>
            </td>
            <script>
                $(document).ready(function(){ 
                    var borrar = $(".b{{$galeria->id}}").click(function(){
                        var id = {{$galeria->id}};
                        var direccion = "{{route('galeria.delete', 0)}}";
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
        </tr> 
@endforeach
    </tbody>
    </table>



                
            
    
   


</div>




@endsection

