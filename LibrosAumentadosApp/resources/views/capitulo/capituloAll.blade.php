@extends("layouts.adminMaster")

@section("content")

            <div class="row">
                <div class="col-lg-12">
                    <!-- ... Titulo de la pagina ... -->
                    <h1 class="page-header">Lista de capitulos</h1>
                    <!-- ... Buscador de elementos ... -->
                    
                </div>
                
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('libro.adminIndex')}}">Libros</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Capitulos</li>
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
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col col-sm-6 options">
                                <a onclick="window.history.back()" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left"></i> Atras</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg btn-block"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            
            <!-- ... Contenido ... -->
            <div class="row">
            @foreach ($capitulos as $capitulo)
                <div class="col-md-6">
                    <div class="hero-widget well well-sm">
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="text">
                            <span class="value">{{$capitulo->numero_orden}}</span>
                            <label class="text-muted">{{$capitulo->titulo}}</label>
                        </div>
                        <div class="row">
                            <div class="col col-sm-6 options">
                                <a href="{{route('capitulo.edit', $libro->id)}}" class="btn btn-warning btn-lg btn-block btn-sm"><i class="fa fa-pencil"></i> Modificar</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{route('capitulo.delete', $capitulo->id)}}" class="btn btn-danger btn-lg btn-block btn-sm"><i class="fa fa-minus"></i> Borrar</a>
                            </div>
                            <div class="col col-sm-12 options">
                                <div class="row">
                                    <div class="col col-sm-3">
                                        <a href="{{ route('libro.paginas', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Paginas</a>
                                    </div>
                                    <div class="col col-sm-3">
                                        <a href="{{ route('libro.imagenes', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Imagenes</a>
                                    </div>
                                    <div class="col col-sm-3">
                                        <a href="{{ route('libro.galerias', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Galerias</a>
                                    </div>
                                    <div class="col col-sm-3">
                                        <a href="{{ route('libro.audios', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Audios</a>
                                    </div>
                                    <div class="col col-sm-4">
                                        <a href="{{ route('libro.videos', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Videos</a>
                                    </div>
                                    <div class="col col-sm-4">
                                        <a href="{{ route('libro.modelos', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Modelos 3D</a>
                                    </div>
                                    <div class="col col-sm-4">
                                        <a href="{{ route('libro.descargas', $capitulo->id) }}" class="multimedia-icons"><i class="fa fa-pencil"></i> Otros</a>
                                    </div>
                                </div>
                                <!--
                                <a href="javascript:;" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fa fa-eye"></i> Ver</a>
                                -->
                            </div>

                        </div>
                        
                    </div>
                </div>
            @endforeach
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-trash"></i> Vaciar libro
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                    <a href="#" class="btn btn-default btn-block">-</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


@endsection