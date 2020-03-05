@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
    <a href="{{ route('capitulo.all', $libro_id) }}">Capitulo</a>
        <h1>Modelos</h1>
        
        <p>
          <a href="{{ route('modelo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Modelo3d</a>
        </p>
      </div>
</section>




<div class="container">
    {{ $modelos->links() }}
    <div class="row">
        <h2>Lista</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Capitulo</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modelos as $modelo)
                    <tr>
                        <td>
                            <a href="{{route('capitulo.contenido', ['id'=>$modelo->capitulo_id])}}">Capitulo {{$modelo->capitulo_id}}</a>
                        </td>
                        <td>{{$modelo->titulo}}</td>
                        <td>
                            <a href="{{route('modelo.show', $modelo->id)}}" class="btn btn-sm btn-info" role="button">Ver</a>
                            @auth
                                <a href="{{route('modelo.edit', $modelo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>


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

                                            location.href='{{route('modelo.delete', $modelo->id)}}'; 
                                            
                                            } else {
                                                swal("¡Su elemento está a salvo!");
                                            }
                                        }); 
                                           
                                    }
                                       
                                    </script>

                            @endauth
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
        </div>
</div>    



@endsection


