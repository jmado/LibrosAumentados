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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Lista de galerias a las que pertenece esta imagen</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($galerias as $galeria) 
                        <tr>
                            <td>{{$galeria->titulo}}</td>
                        </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            
            <div class="form-group">
                <div class="imagen_formulario">
                    <img src="{{ url($datos->imagen) }}" alt="{{$datos->titulo}}">
                </div>
            </div>
            

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







        