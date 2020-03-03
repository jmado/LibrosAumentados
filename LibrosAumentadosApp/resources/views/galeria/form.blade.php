@extends("../layouts.master")

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



<div class="container">
    
    @isset($galeria)
        <form action="{{ route('galeria.update', ['galerium' => $galeria->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf

            <div class="form-group">
                <input type="text" name="capitulo_id" value="{{$capitulos}}" hidden>
            </div>
            
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input id="title" type="text" name="titulo" class="form-control" value="{{$galeria->titulo ?? ''}}" required>
            </div>
            
            <div class="form-group">
                <label for="info">Descripción:</label>
                <input id="info" type="text" name="descripcion" class="form-control" value="{{$galeria->descripcion ?? ''}}" required>
            </div>
            
            <div class="form-group">
                <label for="type">Tipo</label>
                <select class="form-control" id="type" name="tipo">
                    <option value="normal">Normal</option>
                    <option value="transparencia">Transparente</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="img">Imagenes</label>
                <select id="img" name="imagenes_id[]" class="form-control" multiple>
                    @foreach ($imagenes as $imagen)
                        @isset($galeria)
                            @if($galeria->imagenes()->get()->contains($imagen->id))
                                <option value={{$imagen->id}} selected>{{$imagen->id}}</option>    
                            @else   
                                <option value={{$imagen->id}}>{{$imagen->id}}</option> 
                            @endif
                            @else   
                                <option value={{$imagen->id}}>{{$imagen->id}}</option> 
                        @endisset
                    @endforeach
                </select>
            </div>

            
            <input type="submit" value="Enviar" class="btn btn-primary mb-12 btn-block" role="button">

            </form>

    </div>    
</div>

@endsection





  

