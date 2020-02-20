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
      <iframe src="../../{{$datos->archivo}}" height="400" width="100%"></iframe>
    </div> 
    <div>
      <h1>{{$datos->titulo}}</h1>
      <a href="capitulo">Capitulo: {{$datos->capitulo_id}}</a>
      <p class="lead">Descripcion: {{$datos->descripcion}}</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <a href="{{route('descarga.edit', $datos->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
            <a href="{{route('descarga.delete', $datos->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
        </div>
    </div>
    </div>
  </div>

@endsection