@extends("../layouts.master")

@section("content")

<section class="text-center">
    <div class="container">    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </div>
</section>


<div class="container">
    @isset($pagina)
        <form action="{{ route('pagina.update', ['pagina' => $pagina->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form action="{{ route('pagina.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf

        <div class="form-group">
            <label for="texto">Texto: </label>
            <textarea name="texto"  class="form-control" id="texto">{{$pagina->texto ?? ''}}</textarea>
        </div>

        <div class="form-group">
            <label for="n_pagina">Numero de pagina:</label>
            <input type="text" name="numero_pagina" class="form-control" id="n_pagina" value="{{$pagina->numero_pagina ?? ''}}">
        </div>

        <div class="form-group">
            <label for="capitulo">ID del Capitulo:</label>
            <input type="text" name="capitulo_id" class="form-control" id="capitulo" value="{{$pagina->capitulo_id ?? ''}}" required>
        </div>
        
        
        <input type="submit" class="btn btn-primary btn-block" role="button" value="Editar">
        
    </form>
        


</div>
    
    
@endsection