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
    <div class="row mt-5 mb-5">
        <div class="col">
            <a href="{{ route('galeria.create', $capitulo) }}" class="btn btn-primary btn-lg" role="button">
                <i class="fas fa-plus"></i> Añadir Galeria
            </a>
        </div>
    </div>
    @endauth



    {{ $galerias->links() }}
    @foreach ($galerias as $galeria)
    <div class="row border rounded p-2 mt-3">
        <div class="col">
            <div class="row text-center p1">
                <div class="col">
                    Imagen¿?
                </div>
                <div class="col">
                    <div class="row text-center">
                        <div class="col">{{$galeria->titulo}}</div>
                    </div>
                    <div class="row">
                        <div class="col">{{$galeria->descripcion}}</div>
                    </div> 
                    <div class="row">
                        <div class="col">
                            <a href="{{route('galeria.show', $galeria->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @auth
    <div class="row">
        <div class="col p1">
            <a href="{{route('galeria.edit', $galeria->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
            <a href="#"  class="b{{$galeria->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>
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
        </div>
    </div>
    @endauth
    @endforeach


</div>

{{-- 
<section class="text-center">
    <div class="container">
        
        <h1>Galerias</h1>

        <p>
            
                <a href="{{ route('galeria.create', $capitulo) }}" class="btn btn-primary btn-lg" role="button">Nueva Galeria</a>
            
        </p>
      </div>
</section>



<div class="elementos container">
    <div class="row">
        <h2>Capitulo {{$numero_orden[0]->numero_orden}} Lista de galerias</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        
                        <th>Titulo</th>
                        <th>Descripcion</th>
                         
                    </tr>
                </thead>
                <tbody>
                {{ $galerias->links() }}
                    @foreach ($galerias as $galeria)
                    <tr>
                        <td>{{$galeria->titulo}}</td>
                        <td>{{$galeria->descripcion}}</td> 
                        <td>
                            <a href="{{route('galeria.show', $galeria->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a>
                            @auth
                                <a href="{{route('galeria.edit', $galeria->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="#"  class="b{{$galeria->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>
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
                        </td>
                    </tr>    
                    @endforeach
                    
                </tbody>
        </div>
</div>    
--}}


@endsection

