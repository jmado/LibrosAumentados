@extends("layouts.master")

@section("content")



<div class="jumbotron">
  <h3 class="text-center">Lista de libros</h3>
  
  <hr class="my-4">
  <div class="elementos container-fluid">
    {{ $libroList->links() }}
        <div class="row">

            <div class="col-md-3">
                Buscador
            </div>
            @foreach ($libroList as $libro)   
            <div class="col-md-3 badge-secondary">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                    <p>
                        <a href="{{route('contenido.contenido', $libro->id)}}"><img src='{{ URL::asset("$libro->cubierta")}}' class="cubierta"></a>
                    </p>
                    </div>
                    <div class="elemento-body">
                        <h6>{{$libro->titulo}}</h6>
                        <p>{{$libro->subtitulo}}</p>
                        <p>Autor: {{$libro->autor}}</p>
                    </div>
                </div>
            </div>  
            @endforeach


        </div>
       
    </div>    
</div>

{{-- 
<section class="text-center">
    <div class="container-fluid">
        <h1>Libros</h1>
        
    </div>
</section>

    <div class="elementos container">
    {{ $libroList->links() }}
        <div class="row">


            @foreach ($libroList as $libro)   
            <div class="col-md-3">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                    <p>   
                        <a href="{{route('contenido.contenido', $libro->id)}}"><img src='{{ URL::asset("$libro->cubierta")}}' class="cubierta"></a>
                    </p>
                    </div>
                    <div class="elemento-body">
                        <h6>{{$libro->titulo}}</h6>
                        <p>{{$libro->subtitulo}}</p>
                        <p>Autor: {{$libro->autor}}</p>
                    </div>
                </div>
            </div>  
            @endforeach


        </div>
       
    </div>    
    --}}




@endsection
