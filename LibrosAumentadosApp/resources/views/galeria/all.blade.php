@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <a href="{{ route('capitulo.all', $id) }}">Capitulo</a>
        <h1>Galerias</h1>
        <p>
          <a href="{{ route('galeria.create') }}" class="btn btn-primary btn-lg" role="button">Nueva Galeria</a>
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
                        <th>Descripcion</th>
                        <th></th>  
                    </tr>
                </thead>
                <tbody>
                {{ $galerias->links() }}
                    @foreach ($galerias as $galeria)
                    <tr>
                        <td>
                            <a href="{{route('capitulo.all', $galeria->capitulo_id)}}" class="btn btn-sm btn-primary" role="button">{{$galeria->capitulo_id}}</a>
                        </td>
                        <td>{{$galeria->titulo}}</td>
                        <td>{{$galeria->descripcion}}</td> 
                        <td>
                            <a href="{{route('galeria.show', $galeria->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a>
                            <a href="{{route('galeria.edit', $galeria->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                            <a href="{{route('galeria.delete', $galeria->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                        </td>
                    </tr>    
                    @endforeach
                    
                </tbody>
        </div>
</div>    



@endsection

