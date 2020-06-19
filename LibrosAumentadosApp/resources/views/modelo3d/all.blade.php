@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Modelos 3D</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de modelos 3D
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
							@foreach ($modelos as $modelo)
								<tr class="gradeA">
									<td>{{$modelo->capitulo}}</td>
									<td>{{$modelo->titulo}}</td>
									<td>{{$modelo->descripcion}}</td>
									<td>
										<a href="{{route('modelo.show', $modelo->id)}}" target="_blank" class="ver-btn mv{{$modelo->id}}" id="mv{{$modelo->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('modelo.editAdmin', $modelo->id)}}" class="text-warning modificar-btn mm{{$modelo->id}}" id="mm{{$modelo->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a onclick="mb{{$modelo->id}}()" class="text-danger borrar-btn mb{{$modelo->id}}" id="mb{{$modelo->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
								<script>
									function mb{{$modelo->id}}(){
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
                                        modal.setContent(`<p>¿Seguro que quieres borrar "{{$modelo->titulo}}"?</p>`);
										// add a button
                                        modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--primary', function() {
                                            // here goes some logic
                                            modal.close();
                                        });

                                        // add another button
                                        modal.addFooterBtn('Borrar', 'tingle-btn tingle-btn--danger', function() {
                                            // here goes some logic
                                            modal.close();
                                            window.location.href="{{route('modelo.delete', $modelo->id)}}";
                                        });
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
						<h4>Añadir nuevos modelos 3D</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('modelo.createAdmin')}}"><i class="fas fa-plus-square"></i> Nuevo modelo 3D</a>
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