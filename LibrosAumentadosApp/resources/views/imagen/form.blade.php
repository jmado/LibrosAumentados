@extends("layouts.master")

@section("content")



<div class="container p-5">
<section class="text-center">
    <div class="container pb-3">    
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
            <form action="{{ route('imagen.update', ['imagen' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
        @else
            <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data">
        @endisset
            @csrf
            

            


            @if(isset($galerias))
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Galerias en las que aparece</strong></li>
                        @foreach ($galerias as $galeria)  
                            <li class="list-group-item">{{$galeria->titulo}}</li>
                        @endforeach
                </ul>
            </div>
            
            @endif

            

           <div class="form-group">
                <label for="title">Titulo:</label>
                <input id="title" type="text" name="titulo" class="form-control" value="{{$datos->titulo ?? ''}}" required>
           </div>
           <div class="form-group">
                <label for="info">Descripción:</label>
                <input id="info" type="text" name="descripcion" class="form-control" value="{{$datos->descripcion ?? ''}}" required>
           </div>
           <div class="form-group pt-3">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="fichero" lang="es">
                    <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
                </div>
           </div>
           <div class="form-group pt-3">
                
                @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                @endforeach
                @endif   
                
           </div>
            <div class="form-group pt-3">
            <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">
            </div>
            

            </form>

    </div>    
</div>
</div>


@endsection







        