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


    <div class="container text-center">
        <div class="row">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Usuario</a><br>
        </div>
        <br>
        <div class="row">
            {{--<div class="col-2">ID</div>--}}
            <div class="col-2">NOMBRE</div>
            <div class="col-2">EMAIL</div>
            <div class="col-2">FECHA CREACIÓN</div>
            <div class="col-2">ACTUALIZACIÓN</div>
        </div>
        @foreach ($users as $user)
            <div class="row">
                {{--<div class="col-2">{{$user->id}}</div>--}}
                <div class="col-2">{{$user->name}}</div>
                <div class="col-2">{{$user->email}}</div>
                <div class="col-2">{{$user->created_at}}</div>
                <div class="col-2">{{$user->updated_at}}</div>
            {{--</div>--}}
        {{--@endforeach--}}

        {{--<div class="row">--}}
            <div class="col 4">
                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                <a class="b{{$user->id}} btn btn-sm btn-outline-danger" role="button">Borrar</a>
                    <script>
                                $(document).ready(function(){ 
                                    var borrar = $(".b{{$user->id}}").click(function(){
                                        var id = {{$user->id}};
                                        var direccion = "{{route('user.delete', 0)}}";
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
        <br>
        @endforeach

</div>
@endsection