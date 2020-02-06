@extends("../layouts.master")

@section("content")
<div class="box">
    
    @isset($pagina)
        <form action="{{ route('pagina.update', ['pagina' => $pagina->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('pagina.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf
        <div class="row">
            <div class="col-md-6">
                <br>
                Texto: <br>
                {{--<input type="text" name="texto" value="{{$pagina->texto ?? ''}}"><br>--}}
                <textarea name="texto"  cols="30" rows="10">{{$pagina->texto ?? ''}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <br>
                Numero de pagina: <br>
                <input type="text" name="numero_pagina" value="{{$pagina->numero_pagina ?? ''}}"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <br>
                Id del Capitulo: <br>
                <input type="text" name="capitulo_id" value="{{$pagina->capitulo_id ?? ''}}" required><br>
            </div>
        </div>
        
        <br><input type="submit" value="Editar">
        </form>
        

</div>
@endsection