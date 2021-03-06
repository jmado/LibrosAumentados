@extends("layouts.adminMaster")

@section("content")

<div class="row">
                <div class="col-lg-12">
                    <!-- ... Titulo de la pagina ... -->
                    <h1 class="page-header">Lista de modelos 3D</h1>
                    <!-- ... Buscador de elementos ... -->
                    
                </div>
                
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('libro.adminIndex')}}">Libros</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('libro.capitulos', $libro->id) }}">Capítulos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modelos 3D</li>
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
                                <a href="{{ route('libro.capitulos', $libro->id) }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left"></i> Atrás</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a href="{{ route('modelo.create') }}" class="btn btn-primary btn-lg btn-block"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
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
                                <a href="{{route('modelo.edit', $dato->id)}}" class="btn btn-warning btn-lg btn-block btn-sm"><i class="fa fa-pencil"></i> Modificar</a>
                            </div>
                            <div class="col col-sm-6 options">
                                <a onclick="mb{{$dato->id}}()" class="btn btn-danger btn-lg btn-block btn-sm"><i class="fa fa-minus"></i> Borrar</a>
                            </div>
                            <div class="col col-sm-12 options">
                                <a href="{{route('modelo.show', $dato->id)}}" target="_blank" rel="noopener" class="btn btn-primary btn-lg btn-block btn-sm"><i class="fa fa-eye"></i> Ver</a>
                            </div>

                        </div>
                        
                    </div>
                </div>
                <script>
                                    function mb{{$dato->id}}(){
										// instanciate new modal
										var modal = new tingle.modal({
											footer: true,
											stickyFooter: true,
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
                                        modal.setContent(`<p>¿Seguro que quieres borrar "{{$dato->titulo}}"?</p>`);
										// add a button
                                        modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--primary', function() {
                                            // here goes some logic
                                            modal.close();
                                        });

                                        // add another button
                                        modal.addFooterBtn('Borrar', 'tingle-btn tingle-btn--danger', function() {
                                            // here goes some logic
                                            modal.close();
                                            window.location.href="{{route('modelo.delete', $dato->id)}}";
                                        });
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