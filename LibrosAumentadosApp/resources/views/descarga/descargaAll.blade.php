@extends("layouts.adminMaster")

@section("content")

<div class="row">
                <div class="col-lg-12">
                    <!-- ... Titulo de la pagina ... -->
                    <h1 class="page-header">Lista de elementos</h1>
                    <!-- ... Buscador de elementos ... -->
                    
                </div>
                
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('libro.adminIndex')}}">Libros</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('libro.capitulos', $libro->id) }}">Capitulos</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Otros</li>
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
                                <a href="{{ route('libro.capitulos', $libro->id) }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left"></i> Atras</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{ route('descarga.create') }}" class="btn btn-primary btn-lg btn-block"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            
            <!-- ... Contenido ... -->
            <div class="row">
                @foreach($datos as $dato)
                <div class="col-md-4">
                    <div class="hero-widget well well-sm">
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="text">
                            <p><label class="text-muted">{{$dato->titulo}}</label></p>
                            <p><label class="text-muted">{{$dato->descripcion}}</label></p>
                            
                        </div>
                        <div class="row">
                            <div class="col col-sm-6 options">
                                <a href="{{route('descarga.edit', $dato->id)}}" class="btn btn-warning btn-lg btn-block btn-sm"><i class="fa fa-pencil"></i> Modificar</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{route('descarga.delete', $dato->id)}}" class="btn btn-danger btn-lg btn-block btn-sm"><i class="fa fa-minus"></i> Borrar</a>
                            </div>
                            <div class="col col-sm-12 options">
                                <a onclick="d{{$dato->id}}()" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fa fa-eye"></i> Ver</a>
                            </div>

                        </div>
                        
                    </div>
                </div>
                <script>
									function d{{$dato->id}}(){
										// instanciate new modal
										var modal = new tingle.modal({
											footer: false,
											stickyFooter: false,
											closeMethods: ['overlay', 'button', 'escape'],
											closeLabel: "Close",
											cssClass: ['custom-class-1', 'custom-class-2'],
											onOpen: function() {
												console.log('modal open');
											},
											onClose: function() {
												console.log('modal closed');
											},
											beforeClose: function() {
												// here's goes some logic
												// e.g. save content before closing the modal
												return true; // close the modal
												return false; // nothing happens
											}
										});
										// set content
										var url = "{{ URL::asset("$dato->archivo") }}";
                    console.log(url);
										modal.setContent('<iframe src='+url+' width="100%" height="361" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe><p><label class="text-muted">{{$dato->titulo}}</label></p><p><label class="text-muted">{{$dato->descripcion}}</label></p>');
										
										// open modal
										modal.open();
									}
					</script>
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