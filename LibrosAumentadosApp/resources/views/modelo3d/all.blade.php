@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
    <a href="{{ route('capitulo.all', $modelos[0]->capitulo_id) }}">Capitulo</a>
        <h1>Modelos</h1>
        
        <p>
          <a href="{{ route('modelo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Modelo3d</a>
        </p>
      </div>
</section>




<div class="container">
    {{ $modelos->links() }}
    <div class="row">
        <h2>Lista</h2>
        <div class="table-responsive">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Capitulo</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modelos as $modelo)
                    <tr>
                        <td>
                            <a href="{{route('capitulo.contenido', ['id'=>$modelo->capitulo_id])}}">Capitulo {{$modelo->capitulo_id}}</a>
                        </td>
                        <td>{{$modelo->titulo}}</td>
                        <td>
                            <a href="{{route('modelo.show', $modelo->id)}}" class="btn btn-sm btn-info" role="button">Ver</a>
                            @auth
                                <a href="{{route('modelo.edit', $modelo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('modelo.delete', $modelo->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                            @endauth
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
        </div>
</div>    



@endsection


