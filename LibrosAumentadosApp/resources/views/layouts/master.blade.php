<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <!-- JavaScript -->
    <script src="{{ URL::asset('js/main.js')}}"></script>


    <script src="https://kit.fontawesome.com/865c0f1a91.js" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Libros Aumentados</title>
    <!-- Import the component -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>

</head>
<body>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column"> 

    <!-- Cabecera -->
<header class="header">
  <h2 class="logo">LibrosAumentados</h2>
  <input type="checkbox" id="chk">
  <label for="chk" class="show-menu-btn">
    <i class="fas fa-ellipsis-h"></i>
  </label>

  <ul class="menu">
    <a href="{{route('libro.index')}}">Home</a>
    <a href="{{route('libro.index')}}">Libros</a>
    <a href="#">Sobre nosotros</a>
    <a href="#">Contacto</a>
    <label for="chk" class="hide-menu-btn">
      <i class="fas fa-times"></i>
    </label>
  </ul>
</header>


       




    <!-- Contenido -->
    <main role="main" class="content">
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