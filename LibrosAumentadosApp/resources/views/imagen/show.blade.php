@extends("layouts.master")



@section("content")

<section class="text-center">
  <div class="container">
      <p>
        <a href="{{ route('imagen.all', $datos->capitulo_id) }}" class="btn btn-primary " role="button">Imagenes</a>
      </p>
    </div>
</section>


<div class="container"> 
    <div class="imagen">
        <p>
            <a href="../{{$datos->imagen}}"><img src="../{{$datos->imagen}}" alt="{{$datos->titulo}}"></a>
        </p>
    </div> 
    <div>
      <h1>{{$datos->titulo}}</h1>
      <a href="capitulo">Capitulo: {{$datos->capitulo_id}}</a>
      <p class="lead">Descripcion: {{$datos->descripcion}}</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <a href="{{route('imagen.edit', $datos->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
            <a href="{{route('imagen.delete', $datos->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
        </div>
    </div>
    </div>
  </div>

@endsection