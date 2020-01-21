@extends("../layouts.master")

@section("content")
<div class="box">
    <div class="row">
        <div class="col-md-8">



            @isset($galeria)
                <form action="{{ route('galeria.update', ['galerium' => $galeria->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
                @method("PUT")
            @else
                <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
            @endisset
                @csrf
                <div class="row">
                    <div class="col-md-7">
                {{--<div class="form-group">--}}
                    {{--
                        dd($galeria->capitulo_id)
                    --}}
                    <br>
                    <div class="col-md-7">
                        <label for="capitulo_id">Capitulo</label> <br>
                    </div>
                    </div>
                    <div class="col-md-6">
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
                {{--</div>--}}
                </div>
                <br>
                <div class="row">
                {{--<div class="form-group">--}}
                    <br>
                    <div class="col-md-7">
                        <label for="titulo">Titulo</label> <br>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="titulo" class="form-control" value="{{$galeria->titulo ?? ''}}" required> <br>
                    </div>
                {{--</div>--}}
                </div>

                <div class="row">
                {{--<div class="form-check">--}}                
                    <div class="col-md-8">
                        <label for="titulo">Descripción</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="descripcion" class="form-control" value="{{$galeria->descripcion ?? ''}}" > <br>
                    </div>
                {{--</div>--}}
                </div>
                <br>
                {{--<div class="input-group mb-3">
                    <div class="input-group-prepend">--}}
                <div class="row">
                    <div class="col-md-5">
                        <label class="input-group-text" for="tipo">Tipo</label>
                   
                    {{--</div>--}}
                    <select class="custom-select" id="tipo" name="tipo">
                      <option value="normal">Normal</option>
                      <option value="transparencia">Transparente</option>
                    </select>
                  {{--</div>--}}
                    </div>
                </div>
                <br>
                {{--<div class="form-check">--}}
                    <div class="row">
                        <div class="col-md-4">
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
                {{--</div>--}}
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
              </form>



        </div>
    </div>
</div>
    

@endsection