@extends("layouts.master")



@section("content")
<div class="box">

    <a href="{{ route('imagen.create') }}">Nueva Imagen</a><br>
    <div class="todas">
        @foreach ($datos as $imagen)

            <div class="row"> 

                <div class="col-xs-12 col-sm-6">
                    <div class="imagen">
                        <a href="{{route('imagen.show', $imagen->id)}}"><img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}"></a> 
                    </div>  
                </div>

                <div class="col-xs-12 col-sm-6">
                       {{--<a href="{{$imagen->capitulo_id}}">Capitulo: {{$imagen->capitulo_id}}</a>--}}
                    <p>Capitulo: {{$imagen->capitulo_id}}</p>
                    <div class="modificar">
                        <a href="{{route('imagen.edit', $imagen->id)}}" class="btn_modificar">Modificar</a>
                    </div>
                    <div class="borrar">
                        <a href="{{route('imagen.delete', $imagen->id)}}" class="btn_borrar">Borrar</a>
                    </div>
                </div>

            </div>

            <br><br><br><br>
        @endforeach
        </div>

</div>
@endsection