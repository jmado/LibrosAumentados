@extends("layouts.master")

@section("content")


<div class="container p-5">
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
            <form action="{{ route('audio.update', ['audio' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
        @else
            <form action="{{ route('audio.store') }}" method="POST" enctype="multipart/form-data">
        @endisset
            @csrf
            

            

            

            <div class="form-group">
                <label for="title">Titulo:</label>
                <input id="title" type="text" name="titulo" class="form-control" value="{{$datos->titulo ?? ''}}" required>
            </div>
            
            <div class="form-group">
                <label for="info">Descripción:</label>
                <input id="info" type="text" name="descripcion" class="form-control" value="{{$datos->descripcion ?? ''}}" required>
            </div>
           
            
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="fichero" lang="es">
                    <label class="custom-file-label" for="fichero">Seleccionar Audio .mp3</label>
                </div>
            </div>
            
            
            
            <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">
            </div>
            
            </form>

    </div>    
</div>
</div>



@endsection

