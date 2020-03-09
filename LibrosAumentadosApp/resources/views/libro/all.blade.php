@extends("layouts.master")

@section("content")

<section class="text-center">
    <div class="container">
        <h1>Libros</h1>
        <p>
            @auth
                <a href="{{ route('libro.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Libro</a>      
            @endauth
        </p>
    </div>
</section>

    <div class="elementos container">
    {{ $libroList->links() }}
        <div class="row">


            @foreach ($libroList as $libro)   
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                    <p>
                        @if (Auth::check())
                            <a href="{{ route('capitulo.all', $libro->id) }}"><img src='{{ URL::asset("$libro->cubierta")}}' class="cubierta"></a> 
                        @else
                            <a href="/libro/loginVisitante/{{$libro->id}}"><img src='{{ URL::asset("$libro->cubierta")}}' class="cubierta"></a>
                        @endif

                       {{--<a href="{{route('libro.login', ['id_libro'=>$libro->id])}}"><img src='{{$libro->cubierta}}' class="cubierta"></a>--}}

                    </p>
                    
                    </div>
                    <div class="elemento-body">
                        <h3>{{$libro->titulo}}</h3>
                        <h5>{{$libro->subtitulo}}</h5>
                        <p>Autor: {{$libro->autor}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            {{--     <a href='{{route('libro.loginVisitante', ['id_libro'=>$libro->id])}}' class="btn btn-sm btn-info" role="button">Ver</a>--}}
                            @auth
                                <a href="{{route('libro.edit', $libro->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>


                                <a  class="b{{$libro->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>

                                    <script>
                                    $(document).ready(function(){ 
                                        var borrar = $(".b{{$libro->id}}").click(function(){
                                            var id = {{$libro->id}};
                                            var direccion = "{{route('libro.deleteConfirm', 0)}}";
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





@endsection
