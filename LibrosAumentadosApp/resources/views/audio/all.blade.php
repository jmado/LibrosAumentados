@extends("layouts.adminMaster")

@section("content")

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Audios</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabla de audios
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
							@foreach ($audios as $audio)
								<tr class="gradeA">
									<td>{{$audio->capitulo_id}}</td>
									<td>{{$audio->titulo}}</td>
									<td>{{$audio->descripcion}}</td>
									<td>
										<a href="{{route('audio.show', $audio->id)}}" class="ver-btn av{{$audio->id}}" id="av{{$audio->id}}"><i class="far fa-eye"></i> Ver</a>
									</td>
									<td>
										<a href="{{route('audio.editAdmin', $audio->id)}}" class="text-warning modificar-btn am{{$audio->id}}" id="am{{$audio->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('audio.destroy', $audio->id)}}" class="text-danger borrar-btn ab{{$audio->id}}" id="ab{{$audio->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
							@endforeach	
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					<div class="well">
						<h4>Añadir nuevos audios</h4>
						
						<a class="btn btn-default btn-lg btn-block" href="{{route('audio.createAdmin')}}"><i class="fas fa-plus-square"></i> Nuevo audio</a>
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