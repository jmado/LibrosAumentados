@extends("layouts.master")



@section("content")
<div class="box">
    <p>
        <a href="{{ route('imagen.create') }}">Nueva Imagen</a>
    </p>
    <div class="all">
        @foreach ($datos as $imagen)

            <div class="row"> 

                <div class="col-xs-12 col-sm-6">
                    <div class="elemento_principal">
                        <a href="{{route('imagen.show', $imagen->id)}}">
                            <img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}">
                        </a> 
                    </div> 
                    <div class="descripcion">
                        <p>
                            <a href="{{route('capitulo.index')}}">Capitulo: {{$imagen->capitulo_id}}</a>
                        </p>
                        <p>
                            Descripcion: {{$imagen->descripcion}}
                        </p>
                    </div> 
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="btn">
                        <a href="{{route('imagen.show', $imagen->id)}}" class="btn_ver">Ver</a>
                    </div>
                    <div class="btn">
                        <a href="{{route('imagen.edit', $imagen->id)}}" class="btn_modificar">Modificar</a>
                    </div>
                    <div class="btn">
                        <a href="{{route('imagen.delete', $imagen->id)}}" class="btn_borrar">Borrar</a>
                    </div>
                </div>

            </div>

            <br><br><br><br>
        @endforeach
        </div>

</div>
@endsection