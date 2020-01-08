@extends("../layouts.master")

@section("content")
    
    <div class="todas">
    @foreach ($imagenes as $imagen)
        <div class="elemento"> 
            <div class="enlace">
                <a href="capitulo">Capitulo: {{$imagen->capitulo_id}}</a>
            </div>
            <div class="imagen">
                <p><a href='{{$imagen->imagen}}'><img src="{{$imagen->imagen}}" alt="{{$imagen->titulo}}"></a></p>
            </div>    
            <div class="descripcion">
                <p>{{$imagen->descripcion}}</p>
            </div>
        </div>
    @endforeach
    </div>






    @isset($imagen)
        <form action="{{ route('imagen.update', ['imagen' => $imagen->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        Capitulo:
        <input type="text" name="capitulo_id" value="{{$imagen->capitulo_id ?? ''}}" required><br>
        Titulo:
        <input type="text" name="titulo" value="{{$imagen->titulo ?? ''}}" required><br>
        Descripcion:
        <input type="text" name="descripcion" value="{{$imagen->descripcion ?? ''}}"><br>
        Imagen:
        <input type="file" name="imagen"><br>
        <img src="{{$imagen->imagen ?? ''}}" class="cubierta-mini"><br>

        <input type="submit">
        <br>
        </form>
        <br>
@endsection