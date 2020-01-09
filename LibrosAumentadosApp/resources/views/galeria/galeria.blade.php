@extends("layouts.master")



@section("content")

    <div class="show">
        <div class="elemento">
            <img src="/{{$imagen->cover}}">        
        </div>
        <div class="elemento">
            Titulo: {{$imagen->titulo}}
        </div>
        <div class="elemento">
            Descripcion: {{$imagen->descripcion}}
        </div>   
        <div class="elemento">
            Galeria : {{$imagen->galeria}}
        </div>
    </div>





@endsection