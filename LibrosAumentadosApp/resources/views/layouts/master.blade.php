<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <script src="{{ URL::asset('js/main.js')}}"></script>


    <script src="https://kit.fontawesome.com/865c0f1a91.js" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Libros Aumentados</title>
    
</head>
<body>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">  
    <!-- Cabecera -->
<header class="masthead mb-auto bg-dark">
    <div class="collapse" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Menu</h4>
              <ul class="list-unstyled">
                <li>
                  <a href="{{route('welcome')}}">Inicio</a>
                </li>
                <li>
                  <a href="{{route('libro.index')}}">Libros</a>
                </li>
                <li>
                  <a href="{{route('capitulo.index')}}">Capitulos</a>
                </li>
                <li>
                  <a href="{{route('pagina.index')}}">Paginas</a>
                </li>
                <li>
                  <a href="{{route('imagen.index')}}">Imagenes</a>
                </li>
                <li>
                  <a href="{{route('galeria.index')}}">Galerias</a>
                </li>
                <li>
                  <a href="#">Videos</a>
                </li>
                <li>
                  <a href="#">Audios</a>
                </li>
                <li>
                  <a href="#">Modelos 3D</a>
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
</header>
       




    <!-- Contenido -->
    <main role="main">
        <!-- Contenido principal -->
        @yield("content")
    </main>

    

  
</div>

    
    <!-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script> -->
    <!-- Optional JavaScript -->
    <!-- <script src="{{ URL::asset('js/galeria.js')}}"></script> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
</body>
</html>