@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Otros</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de Otros tipos de contenido
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Capitulo ID</th>
									<th>Titulo</th>
									<th>Descripción</th>
									<th>Ver</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($descargas as $descarga)
								<tr class="gradeA">
									<td>{{$descarga->capitulo_id}}</td>
									<td>{{$descarga->titulo}}</td>
									<td>{{$descarga->descripcion}}</td>
									<td>
										<a onclick="d{{$descarga->id}}()" class="ver-btn dv{{$descarga->id}}" id="dv{{$descarga->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('descarga.editAdmin', $descarga->id)}}" class="text-warning modificar-btn dm{{$descarga->id}}" id="dm{{$descarga->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a onclick="db{{$descarga->id}}()" class="text-danger borrar-btn db{{$descarga->id}}" id="db{{$descarga->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
								<script>
									function db{{$descarga->id}}(){
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
                                        modal.setContent(`<p>¿Seguro que quieres borrar "{{$descarga->titulo}}"?</p>`);
										// add a button
                                        modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--primary', function() {
                                            // here goes some logic
                                            modal.close();
                                        });

                                        // add another button
                                        modal.addFooterBtn('Borrar', 'tingle-btn tingle-btn--danger', function() {
                                            // here goes some logic
                                            modal.close();
                                            window.location.href="{{route('descarga.delete', $descarga->id)}}";
                                        });
										// open modal
										modal.open();
									}
									function d{{$descarga->id}}(){
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
										var url = "{{ URL::asset("$descarga->archivo") }}";
										console.log(url);
										modal.setContent('<iframe src='+url+' width="100%" height="361" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe><p><label class="text-muted">{{$descarga->titulo}}</label></p><p><label class="text-muted">{{$descarga->descripcion}}</label></p>');
										
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
						<h4>Añadir nuevo elementos</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('descarga.createAdmin')}}"><i class="fas fa-plus-square"></i> Nuevo elemento</a>
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