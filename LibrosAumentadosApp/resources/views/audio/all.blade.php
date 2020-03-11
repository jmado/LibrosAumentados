@extends("layouts.master")

@section("content")



<section class="text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('capitulo.all', $libro_id) }}">Capitulos</a></li>
                <li class="breadcrumb-item active " aria-current="page">Audios</li>
            </ol>
        </nav>
        
    </div>
</section>
<div class="container">
    <div class="row mt-5 mb-5">
            <div class="col-3">
                <img src="{{ url($libro->cubierta) }}" alt="Cubierta del libro: {{$libro->titulo}}">
            </div>
            <div class="col-9">
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
        <div class="row mt-5 mb-5 text-center">
            <div class="col">
                <a href="{{ route('audio.create') }}" class="btn btn-primary btn-lg" role="button">
                    <i class="fas fa-plus"></i> Añadir audio
                </a>
            </div>
        </div>
        @endauth
    </div>
</div>

<div class="elementos ">
    <div class="container ">
    {{-- $datos->links() --}}
        <div class="row ">

        
            @foreach ($datos as $audio)   
            <div class="col-md-6 pb-5">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        
                        <audio controls>
                            <source src='{{ URL::asset("$audio->archivo") }}' type="audio/mp3">
                            <source src='{{ URL::asset("$audio->archivo") }}' type="audio/ogg">
                            <source src='{{ URL::asset("$audio->archivo") }}' type="audio/mpeg">
                        </audio>
                         
                    </div>
                    <div class="elemento-body ">
                        <p>Título: {{$audio->titulo}}</p>
                        
                        <p>Descripción: {{$audio->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @auth
                                    <a href="{{route('audio.edit', $audio->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>


                                    <a class="b{{$audio->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>

                                    <script>
                                    


                                    $(document).ready(function(){ 
                                        var borrar = $(".b{{$audio->id}}").click(function(){
                                            var id = {{$audio->id}};
                                            var direccion = "{{route('audio.delete', 0)}}";
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