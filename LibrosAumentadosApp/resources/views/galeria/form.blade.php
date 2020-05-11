@extends("../layouts.master")

@section("content")


<div class="container p-5">
<section class="text-center">
    <div class="container">    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atrás</button>
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


        <!-- 
        <div class="custom-control custom-checkbox image-checkbox">
            <input type="checkbox" class="custom-control-input" id="im1">
            <label class="custom-control-label" for="im1">
                <img src="https://source.unsplash.com/640x426/?people" alt="#" class="img-fluid">
            </label>
        </div>
        -->

        

            
            <div class="form-group">
                <label for="title">Título:</label>
                <input id="title" type="text" name="titulo" class="form-control" value="{{$galeria->titulo ?? ''}}" required>
            </div>

            <div class="form-group">
            <div class="custom-file">
                    <input type="file" name="cubierta" class="custom-file-input" id="cubierta" lang="es">
                    <label class="custom-file-label" for="cubierta">Seleccionar una cubierta para la galeria</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="info">Descripción:</label>
                <input id="info" type="text" name="descripcion" class="form-control" value="{{$galeria->descripcion ?? ''}}" required>
            </div>
            
            <div class="form-group">
                <label for="type">Tipo</label>
                <select class="form-control" id="type" name="tipo">
                    @if(isset($galeria->tipo))
                        @if($galeria->tipo == "normal")
                            <option value="normal" selected>Normal</option>
                            <option value="transparencia">Transparente</option>
                        @else
                            <option value="normal">Normal</option>
                            <option value="transparencia" selected>Transparente</option>
                        @endif
                    @else
                        <option value="normal">Normal</option>
                        <option value="transparencia">Transparente</option>
                    @endif

                </select>
            </div>
            
            <div class="form-group">
                <div class="container">
                    <div class="row titulo text-center">
                        <div class="col">Selecciona las imágenes que compondran la galería</div>
                    </div>
                    <div class="row selector-box">
                        
                        <div class="col-12">
                            <div class="row">
                                
                                @foreach ($imagenes as $imagen)
                                    @isset($galeria)
                                        @if($galeria->imagenes()->get()->contains($imagen->id))
                                            <div class="col col-3">
                                                <div class="custom-control custom-checkbox image-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]" checked>
                                                    <label class="custom-control-label" for="i{{$imagen->id}}">
                                                        <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                                    </label>
                                                </div>
                                            </div> <!-- checked -->
                                        @else
                                            <div class="col col-3">
                                                <div class="custom-control custom-checkbox image-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]">
                                                    <label class="custom-control-label" for="i{{$imagen->id}}">
                                                        <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                                    </label>
                                                </div>
                                            </div> <!-- NO checked -->
                                        @endif
                                    @else
                                        <div class="col col-3">
                                            <div class="custom-control custom-checkbox image-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]">
                                                <label class="custom-control-label" for="i{{$imagen->id}}">
                                                    <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                                </label>
                                            </div>
                                        </div>
                                    @endisset
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
                    



                
            </div>

            
            <input type="submit" value="Enviar" class="btn btn-primary mb-12 btn-block" role="button">

            </form>

    </div>    
</div>


</div>

@endsection





  

