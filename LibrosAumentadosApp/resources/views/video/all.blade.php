@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Videos</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de videos
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
								<tr>
									<th>Capitulo</th>
									<th>Titulo</th>
									<th>Descripción</th>
									<th>Ver</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($videos as $video)
								<tr class="gradeA">
									<td>{{$video->capitulo}}</td>
									<td>{{$video->titulo}}</td>
									<td>{{$video->descripcion}}</td>
									<td>
									
										<a onclick="v{{$video->id}}()" class="enlace ver-btn vv{{$video->id}}" id="vv{{$video->id}}"><i class="far fa-eye"></i> Ver</a>
									
									</td>
									<td>
										<a href="{{route('video.editAdmin', $video->id)}}" class="text-warning modificar-btn vm{{$video->id}}" id="vm{{$video->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a onclick="vb{{$video->id}}()" class="enlace text-danger borrar-btn vb{{$video->id}}" id="vb{{$video->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
								
								<script>
								function vb{{$video->id}}(){
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
                                        modal.setContent(`<p>¿Seguro que quieres borrar "{{$video->titulo}}"?</p>`);
                                        // add a button
                                        modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--primary', function() {
                                            // here goes some logic
                                            modal.close();
                                        });

                                        // add another button
                                        modal.addFooterBtn('Borrar', 'tingle-btn tingle-btn--danger', function() {
                                            // here goes some logic
                                            modal.close();
                                            window.location.href="{{route('video.delete', $video->id)}}";
                                        });
                                        // open modal
                                        modal.open();
                                    }
									function v{{$video->id}}(){
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
										
										modal.setContent('<iframe src="https://player.vimeo.com/video/{{$video->video}}" width="100%" height="361" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe><p><label class="text-muted">{{$video->titulo}}</label></p><p><label class="text-muted">{{$video->descripcion}}</label></p>');
										
										// open modal
										modal.open();
									}
								</script>
								
							@endforeach	
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					<div class="well">
						<h4>Añadir nuevos videos</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('video.createAdmin')}}"><i class="fas fa-plus-square"></i> Nuevo video</a>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

@endsection