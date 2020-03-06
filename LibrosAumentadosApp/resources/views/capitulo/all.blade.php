@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-primary"><a href="/">LibrosAumentadosApp</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page">Capitulos</li>
            </ol>
        </nav>

        <h1>Capitulos</h1>
        <p>
            @auth
                <a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Capitulo</a>
            @endauth
        </p>
      </div>
</section>

<section class="elementos container">
    {{ $capituloList->links() }}
    <div class="row">
    <h2>Lista de capitulos {{$capituloList}}</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Capitulo</th>
                        <th>Titulo</th>
                        <th></th> 
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capituloList ?? '' as $capitulo)
                    <tr>
                        <td>
                            {{$capitulo->numero_orden}}
                        </td>
                        <td colspan="7">
                            {{$capitulo->titulo}}
                        </td>
                    </tr>
                    <tr class="capitulos">
                        <th><a href="{{ route('imagen.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/imagen.png') }}" alt="">
                        </a></th> 
                        <th><a href="{{ route('galeria.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/galeria.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('audio.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/audio.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('video.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/video.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('modelo.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/modelo.png') }}" alt="">
                        </a></th>
                        <th><a href="{{ route('descarga.all', $capitulo->id) }}">
                            <img src="{{ URL::asset('complementos/iconos/descargas.png') }}" alt="">
                        </a></th>
                        @auth
                            <th><a href="{{ route('pagina.all', $capitulo->id) }}">
                                <img src="{{ URL::asset('complementos/iconos/pagina.png') }}" alt="">
                            </a></th>
                        @endauth

                        <td class="btn">
                            @auth
                                <a href="{{route('capitulo.edit', $capitulo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                
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
                                                
                                            location.href='{{route('capitulo.delete', $capitulo->id)}}'; 

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


