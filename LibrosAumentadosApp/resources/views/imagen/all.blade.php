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
</section>


<div class="container">
    <div class="row">
        <div class="col-6">
            <form class="form-group">
           
                <input type="text" name="search" id="search" class="form-control" placeholder="Search">
            </form>
        </div>
        <div class="col-6">
            <table class="lista-search">
            
            </table>
        </div>
    </div>         
</div>
<script>
    
$(function(){

   /*
    $('.mimodal').click(function(){
        console.log('hola');
        var task = $(this);
        var id = task.id;
        var img = task.url;
        var titulo = task.titulo;
        var editar = "{{route('galeria.edit', 0)}}";
            editar = editar.replace("0", id);
        var borrar = "{{route('imagen.deleteConfirm', 0)}}";
            borrar = borrar.replace("0", id);
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
*/
let tasks;
    $('#search').keyup(function(){
        if($('#search').val()){

            let search = $('#search').val();

            $.ajax({
                url: "{{ route('imagen.buscador') }}",
                type: 'POST',
                data: {search: search},
                success: function(response){
                    //console.log(response);
                     tasks = JSON.parse(response);
                    let template = '';
                    //console.log(tasks);
                    
                    tasks.forEach(task => {
                        //console.log(task);

                        template += ` 
                        <tr> 
                            <td>${task.titulo}</td>
                            <td> 
                                <a href='https://iescelia.org/librosapp/LibrosAumentadosApp/public/imagen/` + task.id + `/edit' >
                                    <i class="fas fa-plus-circle"></i>
                                </a> 
                            </td>
                            <td> 
                                <a href='https://iescelia.org/librosapp/LibrosAumentadosApp/public/imagen/deleteConfirm/` + task.id + `' >
                                    <i class="fas fa-minus-circle"></i>
                                </a> 
                            </td>   
                        </tr> `;
                    });
                    $('.lista-search').html(template);
                }
            });
        }
    });

});

function modalfuncion(){
    console.log(tasks);
}

</script>



<div class="container">
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
        <div class="row mt-5 mb-5 text-center">
            <div class="col">
                <a href="{{ route('imagen.create') }}" class="btn btn-primary btn-lg" role="button">
                    <i class="fas fa-plus"></i> Añadir imagen
                </a>
            </div>
        </div>
        @endauth
    </div>
</div>



<div class="elementos">
    <div class="container">
    {{ $datos->links() }}
        <div class="row">

        
            @foreach ($datos as $imagen)   
            <div class="col-md-3">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <a href="../../{{$imagen->imagen}}">
                            <img src="../../{{$imagen->imagen}}" alt="{{$imagen->titulo}}">
                        </a> 
                    </div>
                    <div class="elemento-body">
                        <h4>{{$imagen->titulo}}</h4>
                        {{--<p><a href="{{route('capitulo.index')}}">Capitulo: {{$imagen->capitulo_id}}</a></p>--}}
                        <p><b>Descripcion:</b> {{$imagen->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @auth           
                                    <a href="{{route('imagen.edit', $imagen->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>

{{-- 
    <script>
        ruta = "{{route('imagen.deleteConfirm', $imagen->id)}}";
        console.log(ruta);
    </script>
--}}

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