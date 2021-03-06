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
                                <form action="{{ route('libro.update', ['libro' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                @method("PUT")
                            @else
                                <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data">
                            @endisset
                                @csrf

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Título:</label>
                                                <input class="form-control" id="title" type="text" name="titulo"  value="{{$datos->titulo ?? ''}}" required>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title">Autor:</label>
                                                <input class="form-control" id="autor" type="text" name="autor"  value="{{$datos->autor ?? ''}}" required>
                                            </div>       
                                        </div>
                                        <div class="col-lg-6">   
                                            <div class="custom-file">
                                                    <label class="custom-file-label" for="fichero">Seleccionar Imagen</label>
                                                    <input type="file" class="form-control" name="cubierta" class="custom-file-input" id="fichero" lang="es">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="info">Subtítulo:</label>
                                                <input id="info" type="text" name="subtitulo" class="form-control" value="{{$datos->subtitulo ?? ''}}" required>
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