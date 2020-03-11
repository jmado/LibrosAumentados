@extends("../layouts.master")

@section("content")


<div class="container p-5">
    <section class="text-center ">

    <div class="row">
        <div class="container">    
            <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            
        </div>



        <div class="container text-center ">
            <form class="form-signin" action="{{ url('/libro/comprobarPalabra')}}" method="GET">
                @csrf
                <div class="row mt-5 mb-5">
                    <div class="col-4">
                        <img src="{{ url($contenido['imagen']) }}" alt="Cubierta del libro: {{$contenido['libro']}}">
                    </div>
                    <div class="col-8 mt-5">
                        <div class="row">
                        <p>Escribe la palabra que corresponde al </p>
                        </div>
                        <div class="row">
                        Capítulo:    {{$contenido['capitulo']}}
                        </div>
                        <div class="row">
                        Página:    {{$contenido['pagina']}}
                        </div>
                        <div class="row">
                        Párrafo:    {{$contenido['parrafo']}}
                        </div>
                        <div class="row">
                        Palabra:    {{$contenido['palabra']}}
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-5">
                    <input type="hidden" name="id_libro" value="{{$contenido['id_libro']}}">
                    <label for="inputEmail">Escribe la palabra</label>
                    <input type="text" name="palabra" id="palabraTexto" class="form-control" placeholder="Palabra" required="" autofocus=""><br>
                    <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Continuar</button>
                </div>

            </form>
        </div>
    </div>
    </section>

</div>

@endsection