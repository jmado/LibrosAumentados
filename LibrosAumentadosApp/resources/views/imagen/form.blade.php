@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </div>
</section>



<div class="container ">
    <div class="form">
        @isset($datos)
            <form action="/imagen/{{$datos->id}}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
        @else
            <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data">
        @endisset
            @csrf
            

            


            @if($galerias)
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Galerias en las que aparece</strong></li>
                        @foreach ($galerias as $galeria)  
                            <li class="list-group-item">{{$galeria->titulo}}</li>
                        @endforeach
                </ul>
            </div>
            
            @endif

            

            <br>
            <label for="title">Titulo:</label>
            <br>
            <input id="title" type="text" name="titulo" class="form-control" value="{{$datos->titulo ?? ''}}" required>
            <br>
            <label for="info">Descripción:</label>
            <br>
            <input id="info" type="text" name="descripcion" class="form-control" value="{{$datos->descripcion ?? ''}}">
            <br>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="fichero" lang="es">
                <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
            </div>
            <br>
            

            <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">

            </form>

    </div>    
</div>

@endsection







        