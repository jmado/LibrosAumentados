@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item"><a href="{{ route('capitulo.all', $libro_id) }}">Capitulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modelos 3D</li>
            </ol>
        </nav>
        <h1>Modelos 3D</h1>
        
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
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modelos as $modelo)
                    <tr>
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

                                            location.href="{{route('modelo.delete', $modelo->id)}}"; 
                                            //location.href = "modelo/destroy/" + id;
                                            
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


