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
										<a href="{{route('descarga.showAdmin', $descarga->id)}}" class="ver-btn dv{{$descarga->id}}" id="dv{{$descarga->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('descarga.editAdmin', $descarga->id)}}" class="text-warning modificar-btn dm{{$descarga->id}}" id="dm{{$descarga->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('descarga.delete', $descarga->id)}}" class="text-danger borrar-btn db{{$descarga->id}}" id="db{{$descarga->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
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