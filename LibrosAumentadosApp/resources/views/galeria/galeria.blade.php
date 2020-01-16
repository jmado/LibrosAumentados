@extends("layouts.master")



@section("content")
<div class="box">
    <p>
        <a href="{{route('galeria.create')}}">Crear nueva galería</a>
    </p>
    <div class="show">
        <div class="row fila_galeria">
            <div class="col-xs-10 galeria_columna">
                <div class="row galeria">
                    @foreach ($imagenes as $imagen)
                    <div class="col-xs-12 col-sm-6 imagen_galeria">
                        <div class="img">
                            <img src="/{{$imagen->imagen}}">
                        </div>
                    </div>   
                    @endforeach 
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <p>
                    Titulo: {{$galeria[0]->titulo}}
                </p>
                <p>
                    Descripción: {{$galeria[0]->descripcion}}
                </p>
                <p>
                    Tipo de galería: {{$galeria[0]->tipo}}
                </p>
                <p>
                    Capitulo:   {{$galeria[0]->capitulo_id}}
                </p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="btn">
                    <a href="{{route('galeria.edit', $galeria[0]->id)}}">Modificar</a>
                </div>
                <div class="btn">
                    <a href="{{route('galeria.delete', $galeria[0]->id)}}">Borrar</a>
                </div>
            </div>
        </div>
        
        
    </div>

</div>

<script>
    var imagenes = document.getElementsByClassName("imagen_galeria");
    var cont = 0;
  function goLeft() {
    
  }
  function goRight() {
    
  }

</script>




@endsection