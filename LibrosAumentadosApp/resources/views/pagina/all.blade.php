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
									<th>Capitulo ID</th>
									<th>Titulo</th>
									<th>Contenido</th>
									<th>Modificar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
							
							@foreach ($paginas as $pagina)
								<tr class="gradeA">
									<td>{{$pagina->capitulo_id}}</td>
									<td>{{$pagina->numero_pagina}}</td>
									<td>{{$pagina->texto}}</td>
									
									<td>
										<a href="{{route('pagina.editAdmin', $pagina->id)}}" class="text-warning modificar-btn pm{{$pagina->id}}" id="pm{{$pagina->id}}"><i class="fas fa-pen-square"></i> Modificar</a>
									</td>
									<td>
										<a href="{{route('pagina.deleteAdmin', $pagina->id)}}" class="text-danger borrar-btn pb{{$pagina->id}}" id="pb{{$pagina->id}}"><i class="fas fa-minus-square"></i> Borrar</a>
									</td>
								</tr>
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