@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <h1>Libros</h1>
        <p>
          <a href="{{ route('pagina.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Pagina</a>
        </p>
      </div>
</section>




<div class="elementos container">
    <div class="row">
        <h2>Lista</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Capitulo</th>
                        <th>Página</th>
                        <th>Texto</th>
                        <th></th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginaList as $pagina)
                    <tr>
                        <td>
                            {{$pagina->capitulo_id}}
                        </td>
                        <td>{{$pagina->numero_pagina}}</td>
                        <td>{{$pagina->texto}}</td>
                        <td>
                            <a href="{{route('pagina.edit', $pagina->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                            <a href="{{route('pagina.delete', $pagina->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
        </div>
</div>



@endsection





