@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Usuarios</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de usuarios
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Usuario ID</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($usuarios as $usuario)
								<tr class="gradeA">
									<td>{{$usuario->id}}</td>
									<td>{{$usuario->name}}</td>
									<td>{{$usuario->email}}</td>
									<td>
										<a href="{{route('users.edit', $usuario->id)}}" class="text-warning modificar-btn um{{$usuario->id}}" id="um{{$usuario->id}}"><i class="fas fa-user-edit"></i> </a>
									</td>
									<td>
										<a href="{{route('user.delete', $usuario->id)}}" class="text-danger borrar-btn ub{{$usuario->id}}" id="ub{{$usuario->id}}"><i class="fas fa-user-minus"></i> </a>
									</td>
								</tr>
							@endforeach	
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					<div class="well">
						<h4>Añadir nuevos usuarios</h4>
					
						<a class="btn btn-default btn-lg btn-block" href="{{route('users.create')}}"><i class="fas fa-user-plus"></i> Nuevo usuario</a>
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