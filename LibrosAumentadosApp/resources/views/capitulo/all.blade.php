@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Capítulos</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de capítulos
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Libro</th>
									<th>Número</th>
									<th>Título</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							
							@foreach ($capitulos as $capitulo)
								<tr>
									<td>{{$capitulo->libro}}</td>
									<td>{{$capitulo->numero_orden}}</td>
									<td>{{$capitulo->titulo}}</td>
									
									<td>
										<a href="{{route('capitulo.editAdmin', $capitulo->id)}}" class="enlace text-warning modificar-btn cm{{$capitulo->id}}" id="cm{{$capitulo->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('capitulo.deleteAdmin', $capitulo->id)}}" class="enlace text-danger borrar-btn cb{{$capitulo->id}}" id="cb{{$capitulo->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
							@endforeach	
							



							

							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					<div class="well">
						<h4>Añadir nuevos capitulos</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('capitulo.createAdmin')}}"><i class="fas fa-plus-square"></i> Nuevo capitulo</a>
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