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

<div class="elementos">
    <div class="container">
        <div class="row">


            @foreach ($paginaList as $pagina)  
            <div class="col-md-4">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                        <p>Página {{$pagina->numero_pagina}}</p>
                    </div>
                    <div class="elemento-body">
                        {{--<p>{{$pagina->texto}}</p>--}}
                        <textarea name="" id="" cols="50" rows="50" disabled>{{$pagina->texto}}</textarea>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {{--
                                    <a href="{{route('pagina.show', $pagina->id)}}" class="btn btn-sm btn-primary" role="button">Ver</a>
                                --}}
                                <a href="{{route('pagina.edit', $pagina->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                                <a href="{{route('pagina.delete', $pagina->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>  
            @endforeach


        </div>
    </div>    
</div> 


@endsection





