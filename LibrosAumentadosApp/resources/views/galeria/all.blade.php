@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item"><a href="{{ route('capitulo.all', $libro_id) }}">Capitulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galerias</li>
            </ol>
        </nav>
        <h1>Galerias</h1>

        <p>
            @auth
                <a href="{{ route('galeria.create', $capitulo) }}" class="btn btn-primary btn-lg" role="button">Nueva Galeria</a>
            @endauth
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


                                <a href="#" onclick="borrar()" class="btn btn-sm btn-outline-danger" role="button">Borrar</a>

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

                                            location.href="{{route('galeria.delete', $galeria->id)}}"; 
                                            //location.href = "galeria/destroy/" + id;
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

