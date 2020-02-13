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
        <form id="formulario" action="{{ route('pagina.update', ['pagina' => $pagina->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
        @method("PUT")
    @else
        <form id="formulario" action="{{ route('pagina.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @endisset
        @csrf

        <div class="form-group">
            <label for="texto">Texto: </label>
            <textarea name="texto"  class="form-control" id="texto" hidden>{{$pagina->texto ?? ''}}</textarea>
            {{-- Editor de texto online --}}
            <div id="editor" style="border: 1px solid black"></div>
            <div id="markup"></div>
            <script src="https://unpkg.com/pell"></script>
            <script>
                const pell = window.pell;
                const editor = document.getElementById("editor");
                //const markup = document.getElementById("markup");
                const markup = document.getElementById("texto");

                pell.init({
                element: editor,
                onChange: (html) => {
                    markup.innerHTML = "<br>";
                    markup.innerText += html;
                }
                })
            </script>
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
        {{--
        <script>
            function enviar(){
                var markup = document.getElementById("markup").innerText;
                document.getElementById("texto").value = markup;
                document.getElementById("formulario").submit();
            }
        </script>
        --}}
    </form>
        


</div>
    
    
@endsection