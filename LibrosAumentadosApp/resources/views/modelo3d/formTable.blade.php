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
                                <form action="{{ route('video.update', ['video' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                @method("PUT")
                            @else
                                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    <label class="custom-file-label" for="fichero">Seleccionar Modelo 3D</label>
                                                    <input type="file" name="file" class="custom-file-input" id="fichero" lang="es"> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            
                                            <div class="form-group">
                                                <label for="">Libro</label>
                                                <select name="select" class="form-control">
                                                    <option value="value1">Value 1</option> 
                                                    <option value="value2" selected>Value 2</option>
                                                    <option value="value3">Value 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Capitulo</label>
                                                <select name="select" class="form-control">
                                                    <option value="value1">Value 1</option> 
                                                    <option value="value2" selected>Value 2</option>
                                                    <option value="value3">Value 3</option>
                                                </select>
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-default">Enviar</button>
                                            <button type="reset" class="btn btn-default" onclick="window.history.back()">Cancelar</button>
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