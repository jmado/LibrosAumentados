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
                                    <form action="{{ route('imagen.updateAdmin', ['imagen' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                    
                                @else
                                    <form action="{{ route('imagen.update', ['imagen' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                @endif
                                
                                @method("PUT")
                            @else
                                <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data">
                            @endisset
                                @csrf

                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title">Título:</label>
                                                <input class="form-control" id="title" type="text" name="titulo"  value="{{$datos->titulo ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="info">Descripción:</label>
                                                <input id="info" type="text" name="descripcion" class="form-control" value="{{$datos->descripcion ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="fichero">Seleccionar elemento a subir</label>
                                                    <input type="file" name="file" class="custom-file-input" id="fichero" lang="es"> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-default">Enviar</button>
                                            <button type="reset" class="btn btn-default" onclick="window.history.back()">Cancelar</button>
                                        </div>
                                        @if(isset($galerias) && $galerias!=null)
                                        <div class="col-lg-6">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item list-group-item-action active">Galerias a las que pertenece</a>
                                                @foreach($galerias as $galeria)
                                                <a href="#" class="list-group-item list-group-item-action disabled">{{$galeria->titulo}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
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