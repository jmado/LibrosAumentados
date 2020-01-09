<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Libros Aumentados</title>
</head>
<body>
    <div class="title">
        @yield("title")
    </div>
{{--
    <div class="menu">
        <div class="elemento-menu">
            <a href="{{route('libro.all')}}">Libros</a>
            <a href="{{route('imagen.all')}}">Imagenes</a>
            <a href="{{route('galeria.all')}}">Galerias</a>
            <a href="{{route('libro.all')}}">Otros</a>
        </div>
    </div>
--}}
    <div class="content">
        @yield("content")   
    </div> 

</body>
</html>