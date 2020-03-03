@extends("../layouts.master")

@section("content")
<section class="text-center selectLogin">

<div class="row rowLogin">
    <div class="container">    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </div>



    <div class="container text-center selectLogin">
        <form class="form-signin" action="/libro/comprobarPalabra" method="GET">
            @csrf
            <input type="hidden" name="id_libro" value="{{$id_libro}}">
            <h1 class="h3 mb-3 font-weight-normal">{{$textoUsuario}}</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="palabra" id="palabraTexto" class="form-control" placeholder="Palabra" required="" autofocus=""><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
        </form>
    </div>
</div>
</section>
@endsection