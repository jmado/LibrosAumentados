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
            <form action="/descarga/{{$datos->id}}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
        @else
            <form action="{{ route('descarga.store') }}" method="POST" enctype="multipart/form-data">
        @endisset
            @csrf
            
            <label for="capitulo">Capitulos:</label>
            <select name="capitulo_id" class="form-control" id="capitulo" required>
                @foreach ($capitulos as $capitulo)
                    @isset($datos)
                        @if($datos->capitulo_id == $capitulo->id)
                            <option value={{$capitulo->id}} selected>{{$capitulo->titulo}}</option>    
                        @else   
                            <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                        @endif
                    @else   
                        <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                    @endisset
                @endforeach
            </select>

            <label for="tipo">Tipo de archivo:</label>
            <select name="tipo_archivo" class="form-control" id="tipo" required>
                    @isset($datos)
                        @if($datos->tipo_archivo == 'pdf')
                            <option value='pdf' selected>PDF</option>
                            <option value='txt' >TXT</option>     
                        @else   
                            <option value='txt' selected>TXT</option>
                            <option value='pdf' >PDF</option>
                        @endif
                    @else   
                        <option value='txt' >TXT</option>
                        <option value='pdf' >PDF</option> 
                    @endisset
            </select>

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
                <label class="custom-file-label" for="fichero">Seleccionar Archivo</label>
            </div>
            <br>
            

            <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">

            </form>

    </div>    
</div>

@endsection







        