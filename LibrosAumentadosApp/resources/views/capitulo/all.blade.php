@extends("layouts.master")

@section("content")
<section class="text-center">
    <div class="container">
        <h1>Capitulos</h1>
        <p>
          <a href="{{ route('capitulo.create') }}" class="btn btn-primary btn-lg" role="button">Nuevo Capitulo</a>
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
                        <th>Titulo</th>
                        <th></th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capituloList as $capitulo)
                    <tr>
                        <td>
                            <a href="{{route('capitulo.contenido', ['id'=>$capitulo->id])}}">Capitulo {{$capitulo->numero_orden}}: {{$capitulo->titulo}}</a>
                        </td>
                        <td>{{$capitulo->titulo}}</td>
                        <td>
                            <a href="{{route('capitulo.edit', $capitulo->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                            <a href="{{route('capitulo.delete', $capitulo->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
        </div>
</div>    



@endsection


