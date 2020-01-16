@extends("layouts.master")



@section("content")
<div class="box">
    <p>
        <a href="{{ route('galeria.create') }}">Nueva Galeria</a>
    </p>
    <div class="todas">
        @foreach ($galerias as $galeria)

            <div class="row">

                <div class="col-xs-12 col-sm-6"> 
                    <div class="elemento_principal">
                            <a href="{{route('galeria.show', $galeria->id)}}">Titulo: {{$galeria->titulo}}</a>  
                    </div>
                    <div class="descripcion">
                        <p>
                            <a href="{{route('capitulo.index')}}">Capitulo: {{$galeria->capitulo_id}}</a>
                        </p>
                        <p>
                            Descripcion: {{$galeria->descripcion}}
                        </p>
                        <p>
                            Tipo: {{$galeria->tipo}}
                        </p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="btn">
                        <a href="{{route('galeria.show', $galeria->id)}}" class="btn_ver">Ver</a>
                    </div>
                    <div class="btn">
                        <a href="{{route('galeria.edit', $galeria->id)}}" class="btn_modificar">Modificar</a>
                    </div>
                    <div class="btn">
                        <a href="{{route('galeria.delete', $galeria->id)}}" class="btn_borrar">Borrar</a>
                    </div>
                </div>

            </div>
            

            <br><br><br><br>
        @endforeach
    </div>

</div>
@endsection