@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Galerias</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de galerias
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
							@foreach ($galerias as $galeria)
								<tr class="gradeA">
									<td>{{$galeria->capitulo_id}}</td>
									<td>{{$galeria->titulo}}</td>
									<td>{{$galeria->descripcion}}</td>
									<td>
										<a href="{{route('galeria.showAdmin', $galeria->id)}}" class="ver-btn gv{{$galeria->id}}" id="gv{{$galeria->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('galeria.editAdmin', $galeria->id)}}" class="text-warning modificar-btn gm{{$galeria->id}}" id="gm{{$galeria->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('galeria.deleteAdmin', $galeria->id)}}" class="text-danger borrar-btn gb{{$galeria->id}}" id="gb{{$galeria->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
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