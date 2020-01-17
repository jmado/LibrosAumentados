@extends("../layouts.master")

@section("content")
 
<div class="box">
    <div class="row">
        <div class="col">



            @isset($galeria)
                <form action="{{ route('galeria.update', ['galerium' => $galeria->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
                @method("PUT")
            @else
                <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
            @endisset
                @csrf
                <div class="form-group">
                    {{--
                        dd($galeria->capitulo_id)
                    --}}
                  <label for="capitulo_id">Capitulo</label>
                  <select name="capitulo_id" class="form-control" required>
                    @foreach ($capitulos as $capitulo)
                        @isset($galeria)
                               @if($galeria->capitulo_id == $capitulo->id)
                                <option value={{$capitulo->id}} selected>{{$capitulo->titulo}}</option>    
                            @else   
                                <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                            @endif
                        @else   
                            <option value={{$capitulo->id}}>{{$capitulo->titulo}}</option> 
                        @endisset
                    @endforeach
                 </select>
                </div>

                <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" name="titulo" class="form-control" value="{{$galeria->titulo ?? ''}}" required>
                </div>

                <div class="form-check">
                    <label for="titulo">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{$galeria->descripcion ?? ''}}" >
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="tipo">Tipo</label>
                    </div>
                    <select class="custom-select" id="tipo" name="tipo">
                      <option value="normal">Normal</option>
                      <option value="transparencia">Transparente</option>
                    </select>
                  </div>

                <div class="form-check">
                    <label for="titulo">Imagenes</label>
                    <select name="imagenes_id[]" class="form-control" multiple>
                        @foreach ($imagenes as $imagen)
                            @isset($galeria)
                                {{--@if($galeria->imagen_id == $imagen->id)--}}
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

                <button type="submit" class="btn btn-primary">Enviar</button>
              </form>



        </div>
    </div>
</div>
    

@endsection