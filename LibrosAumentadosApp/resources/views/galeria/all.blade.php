@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Galerías</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de galerías
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Capítulo</th>
									<th>Título</th>
									<th>Descripción</th>
									<th>Ver</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($galerias as $galeria)
								<tr class="gradeA">
									<td>{{$galeria->capitulo}}</td>
									<td>{{$galeria->titulo}}</td>
									<td>{{$galeria->descripcion}}</td>
									<td>
										<a href="{{route('galeria.show', $galeria->id)}}" target="_blank" rel="noopener" class="enlace ver-btn gv{{$galeria->id}}" id="gv{{$galeria->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('galeria.editAdmin', $galeria->id)}}" class="text-warning modificar-btn gm{{$galeria->id}}" id="gm{{$galeria->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a onclick="gb{{$galeria->id}}()" class="enlace text-danger borrar-btn gb{{$galeria->id}}" id="gb{{$galeria->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
								<script>
									function gb{{$galeria->id}}(){
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
                                        modal.setContent(`<p>¿Seguro que quieres borrar "{{$galeria->titulo}}"?</p>`);
										// add a button
                                        modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--primary', function() {
                                            // here goes some logic
                                            modal.close();
                                        });

                                        // add another button
                                        modal.addFooterBtn('Borrar', 'tingle-btn tingle-btn--danger', function() {
                                            // here goes some logic
                                            modal.close();
                                            window.location.href="{{route('galeria.delete', $galeria->id)}}";
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
						<h4>Añadir nuevas galerias</h4>
						<a class="btn btn-default btn-lg btn-block" href="{{route('galeria.createAdmin')}}"><i class="fas fa-plus-square"></i> Nueva galeria</a>
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