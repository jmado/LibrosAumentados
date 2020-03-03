@extends("layouts.master")

@section("content")



<section class="text-center">
    <div class="container">
        <a href="{{ route('capitulo.all', $datos[0]->capitulo_id) }}">Capitulo</a>
        <h1>Audios</h1>
        <p>
          <a href="{{ route('audio.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Audio</a>
        </p>
      </div>
</section>

<div class="elementos">
    <div class="container">
    {{ $datos->links() }}
        <div class="row">

        
            @foreach ($datos as $audio)   
            <div class="col-md-4 m-1">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        
                        <audio controls>
                            <source src="../../{{$audio->archivo}}" type="audio/mp3">
                            <source src="../../{{$audio->archivo}}" type="audio/ogg">
                            <source src="../../{{$audio->archivo}}" type="audio/mpeg">
                        </audio>
                         
                    </div>
                    <div class="elemento-body">
                        <h2>{{$audio->titulo}}</h2>
                        <p><a href="{{route('capitulo.index')}}">Capitulo: {{$audio->capitulo_id}}</a></p>
                        <p>Descripcion: {{$audio->descripcion}} </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @auth
                                    <a href="{{route('audio.edit', $audio->id)}}" class="btn btn-sm btn-outline-info" role="button">Modificar</a>
                                    <a href="{{route('audio.delete', $audio->id)}}" class="btn btn-sm btn-outline-danger" role="button">Borrar</a>
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