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
                                    <form action="{{ route('capitulo.updateAdmin', ['capitulo' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                @else
                                    <form action="{{ route('capitulo.update', ['capitulo' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                @endisset
                                @method("PUT")
                            @else
                                <form action="{{ route('capitulo.store') }}" method="POST" enctype="multipart/form-data">
                            @endisset
                                @csrf


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title">Título:</label>
                                                <input class="form-control" id="title" type="text" name="titulo"  value="{{$datos->titulo ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="info">Número:</label>
                                                <input id="info" type="number" name="numero_orden" class="form-control" value="{{$datos->numero_orden ?? ''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            @if(isset($libros) && $libros!=null)
                                            <div class="form-group">
                                                <label for="">Libro</label>
                                                
                                                <select name="libro_id" class="form-control">
                                                @foreach($libros as $l)
                                                    @if(isset($libro) && ($l->id == $libro->id))
                                                    <option value="{{$l->id}}" selected>{{$l->titulo}}</option> 
                                                    @else
                                                    <option value="{{$l->id}}" >{{$l->titulo}}</option>
                                                    @endif
                                                @endforeach
                                                </select>

                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col">
                                                    <img src="{{URL::asset($libro->cubierta)}}" alt="Cubierta del libro" style="width: 190px; height: 300px;">
                                                </div>
                                                <div class="col">
                                                    <p>{{$libro->titulo}}</p>
                                                </div>
                                            </div>
                                            @endif
                    
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-default">Enviar</button>
                                            <button type="reset" class="btn btn-default" onclick="window.history.back()">Cancelar</button>
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