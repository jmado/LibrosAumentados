@extends("layouts.adminMaster")

@section("content")

<div class="row">
                <div class="col-lg-12">
                    <!-- ... Titulo de la pagina ... -->
                    <h1 class="page-header">Lista de audios</h1>
                    <!-- ... Buscador de elementos ... -->
                    
                </div>
                
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('libro.adminIndex')}}">Libros</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('libro.capitulos', $libro->id) }}">Capitulos</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Audios</li>
                </ol>
              </nav>
            <!-- ... Descripcion general del libro ... -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="hero-widget well well-sm">
                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="icon">
                                    <img src="{{URL::asset($libro->cubierta)}}" alt="" style="width: 86px; height: 96px;">
                                </div>
                                <div class="text">
                                    <label class="text-muted">{{$libro->titulo}}</label>
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="text">
                                    <span class="value">{{$capitulo->numero_orden}}</span>
                                    <label class="text-muted">{{$capitulo->titulo}}</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col col-sm-6 options">
                                <a onclick="window.history.back()" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left"></i> Atras</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{ route('audio.create') }}" class="btn btn-primary btn-lg btn-block"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            
            <!-- ... Contenido ... -->
            <div class="row">
            @foreach ($datos as $dato)
                <div class="col-md-4">
                    <div class="hero-widget well well-sm">
                        <div class="icon">
                            <!--<i class="fa fa-book"></i>-->
                            <audio controls style="width: 186px;">
                                <source src="{{URL::asset($dato->archivo)}}" type="audio/ogg">
                                <source src="{{URL::asset($dato->archivo)}}" type="audio/mpeg">
                                Su navegador no es compatible con nuestro audio.
                            </audio>
                        </div>
                        <div class="text">
                            <p><label class="text-muted">{{$dato->titulo}}</label></p>
                            <p><label class="text-muted">{{$dato->descripcion}}</label></p>
                            
                        </div>
                        <div class="row">
                            <div class="col col-sm-6 options">
                                <a href="{{route('audio.edit', $dato->id)}}" class="btn btn-warning btn-lg btn-block btn-sm"><i class="fa fa-pencil"></i> Modificar</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{route('audio.delete', $dato->id)}}" class="btn btn-danger btn-lg btn-block btn-sm"><i class="fa fa-minus"></i> Borrar</a>
                            </div>
                            <div class="col col-sm-12 options">
                                <a href="#" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fa fa-eye"></i> Ver</a>
                            </div>

                        </div>
                        
                    </div>
                </div>
            @endforeach
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-trash"></i> Vaciar audios
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                    <a href="#" class="btn btn-default btn-block">-</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


@endsection