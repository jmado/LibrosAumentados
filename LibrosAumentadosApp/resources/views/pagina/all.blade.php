@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Páginas</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de páginas
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Capítulo</th>
									<th>Título</th>
									<th>Contenido</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							
							@foreach ($paginas as $pagina)
								<tr class="gradeA">
									<td>{{$pagina->capitulo}}</td>
									<td>{{$pagina->numero_pagina}}</td>
									<td>{{$pagina->texto}}</td>
									
									<td>
										<a href="{{route('pagina.editAdmin', $pagina->id)}}" class="enlace text-warning modificar-btn pm{{$pagina->id}}" id="pm{{$pagina->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a onclick="pb{{$pagina->id}}()" class="enlace text-danger borrar-btn pb{{$pagina->id}}" id="pb{{$pagina->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
								<script>
								function pb{{$pagina->id}}(){
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
									modal.setContent(`<p>¿Seguro que quieres borrar "{{$pagina->numero_pagina}}"?</p>`);
									// add a button
									modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--primary', function() {
										// here goes some logic
										modal.close();
									});

									// add another button
									modal.addFooterBtn('Borrar', 'tingle-btn tingle-btn--danger', function() {
										// here goes some logic
										modal.close();
										window.location.href="{{route('pagina.delete', $pagina->id)}}";
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
						<h4>Añadir nuevas páginas</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('pagina.createAdmin')}}"><i class="fas fa-plus-square"></i> Nueva página</a>
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