@extends("layouts.master")

@section("content")

    <!-- Fin de Cabecera -->

    <!--  Arbol de páginas -->            
    <nav  class="arbol">
      <ol class="breadcrumb">
        <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Inicio</a></li>
        <li class="breadcrumb-item text-primary"><a href="{{ route('libro.index') }}">Libros</a></li>
        <li class="breadcrumb-item active">{{$libro[0]->titulo}}</li> 
      </ol>
    </nav>    
    <!--  FIN Arbol de páginas --> 


    <!-- Contenido principal -->
    <div class="container-fluid">
        <div class="row">

          <!-- Buscador de libros -->
            <div class="col col-12 col-lg-3">
                  <form class="search d-block">
                    <input class="form-control" type="search" placeholder="Buscador de libros" aria-label="Search">
                  </form>
                <div class="search">
                    <ul class="libros-ajax">
                      @forelse ($libros as $l)
                        <li>{{$l->titulo}}</li>
                      @empty
                        <li>...</li>
                      @endforelse
                    </ul>
                </div>
            </div>


            <!-- Libro -->
            <div class="col col-12 col-lg-9">
                <!-- Informacion del libro -->
                <div class="row">
                  <div class="imagen-libro col col-12 col-md-3">
                    <a href="#">
                      <img src='{{ URL::asset($libro[0]->cubierta)}}' class="align-self-center" alt="Cubierta del libro">
                    </a> 
                    
                  </div>
                  <div class="col col-12 col-md-9">
                    <div class="libro-body">
                      <h5>{{$libro[0]->titulo}}</h5>
                      <p>{{$libro[0]->subtitulo}}</p>
                      <p>Autor: {{$libro[0]->autor}}</p>
                    </div>
                    <div class="libro-login">
                      <p class="text-info">Escribe la palabra {{$mensage_login["palabra"]}} del párrafo {{$mensage_login["parrafo"]}} de la página {{$mensage_login["pagina"]}} del capítulo {{$mensage_login["capitulo"]}}</p>
                      {{-- 
                      <p class="mensage-login"><span>Capítulo:</span>{{$mensage_login["capitulo"]}}</p>
                      <p class="mensage-login"><span>Página:</span>{{$mensage_login["pagina"]}}</p>
                      <p class="mensage-login"><span>Párrafo:</span>{{$mensage_login["parrafo"]}}</p>
                      <p class="mensage-login"><span>Palabra:</span>{{$mensage_login["palabra"]}}</p>
                      --}}
                      <p class="mensage-login">Mensage</p>

                      <form action="{{ route('contenido.loginConfirma') }}" method="GEST"  class="formulario">
                      @csrf
                        <input type="text" name="password" class="login form-control"  placeholder="Palabra">
                        <button class="login btn btn-info btn-block" type="submit">Acceder</button>
                    </form>
                    </div>
                  </div>
                   
                </div>
            </div>
            <!--FIN Libro-->

        </div>
        



        <!-- Lista de capitulos -->
        <div class="accordion" id="accordionExample">


          @foreach($capitulos as $capitulo)
            <div class="card">

              <div class="card-header" id="headingThree">
                <h6>
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-plus"></i>
                  </button>
                  <span class="mensage">{{$capitulo->titulo}}</span>
                </h6>
              </div>

              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">

                <!-- -->
                  <div class="row">
                    <div class="col col-12 col-md-2">
                      <i class="fas fa-video"></i>
                    </div>
                    <div class="col col-12 col-md-10">
                      <h5>List-based media object</h5>
                      <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                      </p>
                    </div>
                  </div>
                <!-- -->

                </div>
              </div>

            </div>
          @endforeach



        </div>
        




    </div>

@endsection