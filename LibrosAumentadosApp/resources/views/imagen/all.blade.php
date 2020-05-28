@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Imagenes</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de imagenes
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
							@foreach ($imagenes as $imagen)
								<tr class="gradeA">
									<td>{{$imagen->capitulo_id}}</td>
									<td>{{$imagen->titulo}}</td>
									<td>{{$imagen->descripcion}}</td>
									<td>
										<a href="{{route('imagen.showAdmin', $imagen->id)}}" class="ver-btn iv{{$imagen->id}}" id="iv{{$imagen->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('imagen.editAdmin', $imagen->id)}}" class="text-warning modificar-btn im{{$imagen->id}}" id="im{{$imagen->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('imagen.delete', $imagen->id)}}" class="text-danger borrar-btn ib{{$imagen->id}}" id="ib{{$imagen->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
							@endforeach	
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					<div class="well">
						<h4>Añadir nueva imagen</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('imagen.createAdmin')}}"><i class="fas fa-plus-square"></i> Nueva imagen</a>
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