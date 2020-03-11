@extends("../layouts.master")

@section("content")


<div class="container p-5">
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
            <form class="form-signin" action="{{ url('/libro/comprobarPalabra')}}" method="GET">
                @csrf
                <div class="row mt-5 mb-5">
                    <div class="col-3">
                        <img src="{{ url($contenido->imagen) }}" alt="Cubierta del libro: {{$contenido->libro}}">
                    </div>
                    <div class="col-9">
                        <div class="row">
                            {{$contenido->capitulo}}
                        </div>
                        <div class="row">
                            {{$contenido->pagina}}
                        </div>
                        <div class="row">
                            {{$contenido->parrafo}}
                        </div>
                        <div class="row">
                            {{$contenido->palabra}}
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-5">
                    <input type="hidden" name="id_libro" value="{{$contenido->id_libro}}">
                    <label for="inputEmail" class="sr-only">Escribe la palabra</label>
                    <input type="text" name="palabra" id="palabraTexto" class="form-control" placeholder="Palabra" required="" autofocus=""><br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
                </div>

            </form>
        </div>
    </div>
    </section>

</div>

@endsection