@extends("layouts.master")



@section("content")

<section class="text-center">
  <div class="container">
      <p>
        <a href="{{ route('descarga.all', $datos->capitulo_id) }}" class="btn btn-primary " role="button">Archivos</a>
      </p>
    </div>
</section>


<div class="container"> 
    <div class="archivo">
      <div class="contenedorArchivo">
        <iframe src='{{ URL::asset("$datos->archivo") }}' height="400" width="100%"></iframe>
      </div>
      
    </div> 
    <div>
      <h1>{{$datos->titulo}}</h1>
      <p class="lead">Descripcion: {{$datos->descripcion}}</p>
    </div>
  </div>

@endsection