@extends("layouts.adminMaster")

@section("content")

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{-- 
                Boton de atras
                --}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            @isset($datos)
                                @isset($libros)
                                    <form action="{{ route('galeria.updateAdmin', ['galeria' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                    ua
                                @else
                                    <form action="{{ route('galeria.update', ['galerium' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                    u
                                @endif
                                
                                @method("PUT")
                            @else
                                <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data">
                                s
                            @endisset
                                @csrf

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                            @if(isset($libros))
                                                <!--Si hay capitulos a seleccionar -->
                                                {{--
                                                <div class="form-group">
                                                
                                                    <img src="#" alt="Cubierta del libro" style="width: 190px; height: 300px;">
                                                
                                                </div>
                                                --}}
                                                <div class="form-group">
                                                    <label>Capitulo</label>
                                                    <select name="capitulo_id" class="form-control">
                                                    @foreach($capitulos as $c)
                                                        @if(isset($capitulo) && ($c->id == $capitulo->id))
                                                        <option value="{{$c->id}}" selected>{{$c->titulo}}</option> 
                                                        @else
                                                        <option value="{{$c->id}}" >{{$c->titulo}}</option>
                                                        @endif
                                                    @endforeach    
                                                    </select>
                                                </div>
                                            @else
                                                <!--NO hay capitulos a seleccionar -->
                                                <div class="form-group">
                                                    <img src="{{URL::asset($libro->cubierta)}}" alt="Cubierta del libro" style="width: 190px; height: 300px;">   
                                                </div>
                                                <div class="form-group">
                                                    <p>Capitulo: {{$capitulo->titulo}}</p>
                                                </div>
                                            @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="title">Título:</label>
                                                <input class="form-control" id="title" type="text" name="titulo"  value="{{$datos->titulo ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="info">Descripción:</label>
                                                <input id="info" type="text" name="descripcion" class="form-control" value="{{$datos->descripcion ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                            <p>Tipo de galeria</p>
                                                @isset($galeria)
                                                    @if($galeria->tipo == "normal")
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="tipo" id="tipo-normal" value="normal" checked>
                                                            <label class="form-check-label" for="tipo-normal">Normal</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="tipo" id="tipo-transparente" value="transparencia">
                                                            <label class="form-check-label" for="tipo-transparente">Transparente</label>
                                                        </div>
                                                    @else
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="tipo" id="tipo-normal" value="normal">
                                                            <label class="form-check-label" for="tipo-normal">Normal</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="tipo" id="tipo-transparente" value="transparencia" checked>
                                                            <label class="form-check-label" for="tipo-transparente">Transparente</label>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tipo" id="tipo-normal" value="normal">
                                                        <label class="form-check-label" for="tipo-normal">Normal</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tipo" id="tipo-transparente" value="transparencia">
                                                        <label class="form-check-label" for="tipo-transparente">Transparente</label>
                                                    </div>
                                                @endisset
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-default">Enviar</button>
                                                <button type="reset" class="btn btn-default" onclick="window.history.back()">Cancelar</button>
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                               <!-- Listado de imagenes-->
                                                @foreach ($imagenes as $imagen)
                                                    @isset($galeria)
                                                        @if($galeria->imagenes()->get()->contains($imagen->id))
                                                            <div class="custom-control custom-checkbox image-checkbox image-grid">
                                                                <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]" checked>
                                                                <label class="custom-control-label" for="i{{$imagen->id}}">
                                                                    <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                                                </label>
                                                            </div>
                                                        @else
                                                            <div class="custom-control custom-checkbox image-checkbox image-grid">
                                                                <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]">
                                                                <label class="custom-control-label" for="i{{$imagen->id}}">
                                                                    <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="custom-control custom-checkbox image-checkbox image-grid">
                                                            <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]">
                                                            <label class="custom-control-label" for="i{{$imagen->id}}">
                                                                <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                                            </label>
                                                        </div>
                                                    @endisset
                                                @endforeach    
                                            </div>
                                        </div>   
                                    </div>
                                    
                                    

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                @if(count($errors)>0)
                                                    @foreach($errors->all() as $error)
                                                        <div class="text-danger">{{$error}}</div>
                                                    @endforeach
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                
                                
                                </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
</div>	

@endsection