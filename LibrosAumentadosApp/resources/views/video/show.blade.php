@extends("layouts.master")



@section("content")
<div class="container p-5">
    <section class="text-center">
      <div class="container">
          <p>
            <a href="{{ route('video.all', $datos->capitulo_id) }}" class="btn btn-primary " role="button">Videos</a>
          </p>
        </div>
    </section>


    <div class="container"> 
        <div class="row imagen text-center">
            <iframe src="https://player.vimeo.com/video/{{$videoNumero}}" width="640" height="361" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> 
        </div> 
        <div class="row text-center">
            <p><a href="{{$datos->video}}">{{$datos->titulo}}</a> disponible en <a href="https://vimeo.com">Vimeo</a>.</p> 
        </div>
        <div class="row">
            <h1>{{$datos->titulo}}</h1> 
        </div>
        <div class="row">
            <p><a href="capitulo">Capitulo: {{$datos->capitulo_id}} </a></p>
            <p class="lead">Descripcion: {{$datos->descripcion}}</p>  
        </div>
    </div>
</div>


@endsection