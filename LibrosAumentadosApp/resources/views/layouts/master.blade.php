<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    
    <script src="https://kit.fontawesome.com/865c0f1a91.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Libros Aumentados</title>
</head>
<body>

    
    <!-- Cabecera -->
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Menu</h4>
              <ul class="list-unstyled">
                <li>
                  <a class="text-white" href="{{route('welcome')}}">Inicio</a>
                </li>
                <li>
                  <a class="text-white" href="{{route('libro.index')}}">Libros</a>
                </li>
                <li>
                  <a class="text-white" href="{{route('capitulo.index')}}">Capitulos</a>
                </li>
                <li>
                  <a class="text-white" href="{{route('pagina.index')}}">Paginas</a>
                </li>
                <li>
                  <a class="text-white" href="{{route('imagen.index')}}">Multimedia</a>
                </li>
                <li>
                  <a class="text-white" href="{{route('galeria.index')}}">Galerias</a>
                </li>
                <li>
                  @auth
                  <a class="text-white" href="{{route('logout')}}">Cerrar sesión</a>
                  @endauth
                  @guest
                  <a class="text-white" href="{{route('login')}}">Login</a>
                  @endguest
                </li>
              </ul>  
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            Imagen 
            <strong>Logo</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
       




    <!-- Contenido -->
    <main role="main">
        <!-- Contenido principal -->
        @yield("content")
    </main>

    

    <!-- Pie de pagina -->
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
              <a href="#">Volver arriba</a>
            </p>
            <p>Proyecto de Libros Aumentados de 2 DAW del centro educativo I.E.S CELIA VIÑAS 2019-2020&copy; gracias por visitarnos, más información en la web del centro <a href="https://iescelia.org/web/">IES CELIA VIÑAS</a></p>
        </div>
    </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>