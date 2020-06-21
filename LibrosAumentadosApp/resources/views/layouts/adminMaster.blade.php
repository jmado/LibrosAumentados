<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página web que proporciona un contenido multimedia extra a cualquier libro">
    <meta name="author" content="José Manuel Maldonado y Adrián Sánchez">

    <title>LibrosApp - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="{{ URL::asset('css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ URL::asset('css/timeline.css') }}" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="{{ URL::asset('css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

<!-- Estilos basicos para el funcionamiento de las modales tingle-->
<link href="{{ URL::asset('css/tingle.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('css/morris.css') }}" rel="stylesheet">

    <!-- Editor de texto online -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/pell/dist/pell.min.css">

    <!-- Custom Fonts -->
    <script src="https://kit.fontawesome.com/df8e722098.js" crossorigin="anonymous"></script>
    
    <!--Galerias form de imagenes -->
    <style>
    .contenido{
        border-radius: 5px;
        background-color: rgb(48, 48, 48);
        
        }
    .grid-container {
        height: 70%;
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 10px;
        padding: 10px;
        }

    .grid-container > div {
        text-align: center;
        padding: 20px 0;
        }

    .item2 {
        grid-column-start: 2;
        grid-row-start: 1;
        grid-row-end: 6;
        }


    .grid-container2 {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 10px;
        padding: 10px;
        }
    .buscador-grid {
        grid-column-start: 1;
        grid-column-end: 5;

        }
    .image-grid img{
        width: 86px;
        height: 45px;
        border-radius: 5px;
        }

        .enlace{
            cursor: pointer;
        }
    </style>


    <!-- jQuery -->
    <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous">
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- Modales tingle -->
<script src="{{ URL::asset('js/tingle.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ URL::asset('js/metisMenu.min.js') }}"></script>
    
    <!-- DataTables JavaScript -->
    <script src="{{ URL::asset('js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
            $(document).ready(function() {
                console.log("hola");
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
    </script>



    
    
    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('js/startmin.js') }}"></script>
    
</head>
<body>
{{-- 
@unless (Auth::check())
    <script>
        window.location.href = "{{route('login')}}";
    </script>
@endunless
--}}
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">LibrosCelia</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="{{route('libro.index')}}"><i class="fa fa-home fa-fw"></i>Página web</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                @auth
                <a class="dropdown-toggle"  href="{{route('logout')}}">
                    <i class="fa fa-user fa-fw"></i> Cerrar sesión 
                </a>
                @endauth
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{route('libro.adminIndex')}}"><i class="fa fa-book fa-fw"></i> Libros</a>
                    </li>
                    <li>
                        <a href="{{route('user.index')}}"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-archive fa-fw"></i> Contenido de las tablas <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('libro.admin')}}">Libros</a>
                            </li>
                            <li>
                                <a href="{{route('capitulo.admin')}}">Capítulos</a>
                            </li>
                            <li>
                                <a href="{{route('pagina.admin')}}">Páginas</a>
                            </li>
                            <li>
                                <a href="{{route('imagen.admin')}}">Imágenes</a>
                            </li>
                            <li>
                                <a href="{{route('galeria.admin')}}">Galerías</a>
                            </li>
                            <li>
                                <a href="{{route('audio.admin')}}">Audios</a>
                            </li>
                            <li>
                                <a href="{{route('video.admin')}}">Videos</a>
                            </li>
                            <li>
                                <a href="{{route('modelo.admin')}}">Modelos 3d</a>
                            </li>
                            <li>
                                <a href="{{route('descarga.admin')}}">Otros</a>
                            </li>
                                
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Contenido principal -->
            @yield("content")
            <!--
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Page Title</h1>
                </div>
            </div>
            -->

            

        </div>
    </div>

</div>




<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL::asset('js/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('js/startmin.js') }}"></script>

</body>
</html>
