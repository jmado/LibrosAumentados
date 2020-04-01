<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libros Aumentados</title>

    <!-- Meta para peticiones ajax en Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Javascript jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap2.min.css') }}">
    <!-- jQuery -->
    <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous">
    </script>
    
    
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/df8e722098.js" crossorigin="anonymous"></script>
    

    

	  
	
    
    <!-- Import the component -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <!-- Editor de texto online -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/pell/dist/pell.min.css">

    <!-- SweetAllert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style3d.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <!-- JavaScript -->
    <script src="{{ URL::asset('js/main.js')}}"></script>

    
</head>
<body>






<div class="cover-container d-flex h-100 p-3 mx-auto flex-column"> 

    <!-- Cabecera -->
<header class="header bg-primary">
    <a href="{{route('libro.index')}}">
      <h2 class="logo text-light">LibrosAumentados</h2>
    </a>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
      {{--<a href="/">Home</a>--}}
      <a href="{{route('libro.index')}}">Libros</a>
      @auth
        <a href="{{route('users.index')}}">Usuarios</a>    
      @endauth
      <a href="{{route('login')}}">Login</a>
      <a href="{{url('/acercade')}}">Acerca de</a>
        {{-- 
          <a href="#">Sobre nosotros</a>
          <a href="#">Contacto</a>
        --}}
    
    
    @auth
      <a href="{{route('logout')}}">Log out</a>   
    @endauth

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


    
    




    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
</body>
</html>