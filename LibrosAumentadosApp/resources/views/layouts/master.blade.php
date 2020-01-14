<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/flexboxgrid.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    
    <script src="https://kit.fontawesome.com/865c0f1a91.js" crossorigin="anonymous"></script>

    <title>Libros Aumentados</title>
</head>
<body>

    <div class="container">
    <!-- Cabecera -->
    <header class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{--@yield("title")--}}
            <div class="cabecera">
                <h1>Libros aumentados</h1>
            </div>
        </div>
    </header>
       




    <!-- Contenido -->
    <div class="row principal middle-xs around-sm">

        <!-- Menu -->
        <div class="col-xs-12 col-sm-2">
            <div class="menu">
                <ul>
                    <li>
                        <a class="elementos" href="{{route('libro.index')}}">
                            <i class="fas fa-caravan"></i>
                            <span>Inicio</span></a>
                    </li>
                    <li>
                        <a class="elementos" href="{{route('capitulo.index')}}">
                            <i class="fas fa-book"></i>    
                            <span>Libros</span></a>
                    </li>
                    <li>
                         <a class="elementos" href="{{route('imagen.index')}}">
                            <i class="fas fa-photo-video"></i>
                            <span>Multimedia</span></a>
                    </li>
                    <li>
                        <a class="elementos" href="{{route('galeria.index')}}">
                            <i class="far fa-arrow-alt-circle-down"></i>
                            <span>Descargas</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-xs-12 col-sm-10">
            <div class="contenido">
                @yield("content")
            </div>
        </div>

    </div>

    

    <!-- Pie de pagina -->
    <footer class="row">
        <div class="col-xs-12">
            <div class="pie">
                <h2>Pie de pagina</h2>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>