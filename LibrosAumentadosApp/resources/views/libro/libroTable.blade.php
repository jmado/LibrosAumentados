@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tabla de libros</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de Libros
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>ID</th>
									<th>Titulo</th>
									<th>Descripción</th>
									<th>Autor</th>
									<th>Ver</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($libros as $libro)
								
								<tr class="gradeU">
									<td>{{$libro->id}}</td>
									<td>{{$libro->titulo}}</td>
									<td>{{$libro->subtitulo}}</td>
									<td>{{$libro->autor}}</td>
									<td>
										{{--<a href="{{route('libro.showAdmin', $libro->id)}}" class="ver-btn lv{{$libro->id}}" id="lv{{$libro->id}}"><i class="far fa-eye"></i> Ver</a>--}}
										<a class="ver-btn lv{{$libro->id}}" id="lv{{$libro->id}}" onclick="l{{$libro->id}}()"><i class="far fa-eye"></i> Ver</a>
										
									</td>
									<td>
										<a href="{{route('libro.editAdmin', $libro->id)}}" class="text-warning modificar-btn lm{{$libro->id}}" id="lm{{$libro->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('libro.destroy', $libro->id)}}" class="text-danger borrar-btn lb{{$libro->id}}" id="lb{{$libro->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>

								<script>
									function l{{$libro->id}}(){
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
										modal.setContent('<img src="{{URL::asset($libro->cubierta)}}" style="width:30%; display:block; margin:auto;"><p><label class="text-muted">{{$libro->titulo}}</label></p><p><label class="text-muted">{{$libro->subtitulo}}</label></p><p><label class="text-muted">{{$libro->autor}}</label></p>');
										
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
						<h4>Añadir nuevo libro</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('libro.createAdmin')}}"><i class="fas fa-plus-square"></i> Nuevo libro</a>
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