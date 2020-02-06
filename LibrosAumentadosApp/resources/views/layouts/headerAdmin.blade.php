
@extends("layouts.master")

@section("headerAdmin")




<!-- Cabecera -->

      <div class="collapse" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-black">Menu</h4>
              <ul class="list-unstyled">
                <li>
                  <a class="text-black" href="{{route('welcome')}}">Inicio</a>
                </li>
                <li>
                  <a class="text-black" href="{{route('libro.index')}}">Libros</a>
                </li>
                <li>
                  <a class="text-black" href="{{route('capitulo.index')}}">Capitulos</a>
                </li>
                <li>
                  <a class="text-black" href="{{route('pagina.index')}}">Paginas</a>
                </li>
                <li>
                  <a class="text-black" href="{{route('imagen.index')}}">Multimedia</a>
                </li>
                <li>
                  <a class="text-black" href="{{route('galeria.index')}}">Galerias</a>
                </li>
              </ul>  
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center"> 
            <strong>Logo</strong>
          </a>
          <nav class="navbar navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon icon-black"></span>
            </button>
          </nav>
          
        </div>
      </div>
    
@endsection