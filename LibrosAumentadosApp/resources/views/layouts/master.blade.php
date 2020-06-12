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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/pagination.css') }}">


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
    </style>




<!-- Plugin para ordenar y filtrar el contenido de los capitulos -->
<!-- --------------------- SHUFFLE ----------------------------- -->
<style>
      /* Small reset */
      *,
      ::before,
      ::after {
        box-sizing: border-box;
      }

      body {
        color: #34495e;
        padding-bottom: 100px;
      }

      figure {
        margin: 0;
        padding: 0;
      }

      img {
        display: block;
        max-width: 100%;
      }

      a {
        text-decoration: none
      }

      a,
      a:visited {
        color: #3498db
      }

      a:hover {
        text-decoration: underline
      }

      a:active {
        color: #2ecc71
      }

      p {
        margin: 1em 0;
        line-height: 1.4
      }

      /*
        Shuffle needs either relative or absolute positioning on the container
        It will set it for you, but it'll cause another style recalculation and layout.
        AKA worse performance - so just set it here
      */
      .my-shuffle-container {
        position: relative;
        overflow: hidden;
      }

      .my-sizer-element {
        position: absolute;
        opacity: 0;
        visibility: hidden;
      }

      $picture-gutter: 24px;
      $item-height: 220px;
      .picture-item {
        height: 220px;
        margin-top: $picture-gutter;

        img {
          display: block;
          width: 100%;
        }
      }

      @supports (object-fit: cover) {
        .picture-item img {
          max-width: none;
          height: 100%;
          object-fit: cover;
        }
      }

      .picture-item--h2 {
        height: ($item-height * 2) + $picture-gutter; /* 2x the height + 1 gutter */
      }

      .picture-item__inner {
        position: relative;
        height: 100%;
        overflow: hidden;
        background: #ecf0f1;
      }

      .picture-item__details {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        width: 100%;
        padding: 1em;
      }

      .picture-item__description {
        width: 100%;
        padding: 0 2em 1em 1em;
        margin: 0;
      }

      .picture-item__title {
        flex-shrink: 0;
        margin-right: 4px;
      }

      .picture-item__tags {
        flex-shrink: 1;
        text-align: right;
        margin: 0;
      }

      @media screen and (min-width: 768px) {
        .picture-item--overlay {
          .picture-item__details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            backdrop-filter: blur(7px);
            color: white;
            overflow: hidden;
          }

          .picture-item__description {
            display: none;
          }
          
          a {
            color: white;
            text-shadow: 0 0 1px black;
          }
        }
      }

      @media screen and (max-width: 767px) {
        .picture-item {
          height: auto;
          margin-top: 20px;
        }

        .picture-item__details,
        .picture-item__description {
          font-size: 0.875em;
          padding: 0.625em;
        }

        .picture-item__description {
          padding-right: 0.875em;
          padding-bottom: 1.25em;
        }

        .picture-item--h2 {
          height: auto;
        }
      }

      // Filter styling
      // --------------
      .filter-label {
        display: block;
        padding: 0;
        margin-top: 0;
        margin-bottom: 4px;
        color: #95a5a6;
      }

      .filters-group {
        padding: 0;
        margin: 0 0 4px;
        border: 0;
      }

      @media screen and (min-width: 768px) {
        .filters-group-wrap {
          display: flex;
          justify-content: space-between;
        }
      }
      .btn-group:after,.btn-group:before {
        content: " ";
        display: table
      }

      .btn-group:after {
        clear: both
      }

      .btn-group .btn {
        float: left;
        border-radius: 0
      }

      .btn-group .btn:first-child {
        border-radius: 3px 0 0 3px
      }

      .btn-group .btn:not(:first-child) {
        margin-left: -1px
      }

      .btn-group .btn:last-child {
        border-radius: 0 3px 3px 0
      }

      .btn-group label.btn input[type=radio] {
        position: absolute;
        clip: rect(0,0,0,0);
        pointer-events: none
      }

      .btn {
        display: inline-block;
        padding: .75em .8em;
        text-align: center;
        border-radius: 3px;
        border: 1px solid #34495e;
        color: #34495e;
        font-size: 1rem;
        background-color: rgba(52,73,94,0);
        transition: .2s ease-out;
        cursor: pointer;
        -webkit-appearance: none
      }

      @media (-moz-touch-enabled:0),(pointer: fine) {
        .btn:hover {
          color:#fff;
          text-decoration: none;
          background-color: #34495e
        }
      }

      .btn:focus {
        outline-width: 0;
        box-shadow: 0 0 0 2px rgba(52,73,94,.4)
      }

      .btn.active,.btn:active {
        box-shadow: inset 0 1px 2px rgba(0,0,0,.3);
        color: #fff;
        background-color: #34495e
      }

      .btn:focus.active {
        box-shadow: inset 0 1px 2px rgba(0,0,0,.3),0 0 0 2px rgba(52,73,94,.4)
      }

      .btn:disabled {
        cursor: not-allowed;
        opacity: .7;
        color: #34495e;
        background-color: rgba(52,73,94,0)
      }

      .btn--primary {
        color: #3498db;
        border-color: #3498db;
        background-color: rgba(52,152,219,0)
      }

      @media (-moz-touch-enabled:0),(pointer: fine) {
        .btn--primary:hover {
          background-color:#3498db
        }
      }

      .btn--primary:focus {
        box-shadow: 0 0 0 2px rgba(52,152,219,.4)
      }

      .btn--primary.active,.btn--primary:active {
        background-color: #3498db
      }

      .btn--primary:focus.active {
        box-shadow: inset 0 1px 2px rgba(0,0,0,.3),0 0 0 2px rgba(52,152,219,.4)
      }

      .btn--primary:disabled {
        color: #3498db;
        background-color: rgba(52,152,219,0)
      }

      @media screen and (max-width: 767px) {
        .btn {
          font-size:.875rem
        }
      }

      // Textfield
      // ----------------
      .textfield {
        -webkit-appearance: none;
        box-sizing: border-box;
        width: 100%;
        border: 2px solid #95a5a6;
        border-radius: 4px;
        padding: .5em;
        font-size: 1rem;
        color: #34495e;
        transition: .15s
      }

      .textfield::-webkit-input-placeholder {
        color: #95a5a6;
        transition: .15s
      }

      .textfield:-ms-input-placeholder {
        color: #95a5a6;
        transition: .15s
      }

      .textfield::-ms-input-placeholder {
        color: #95a5a6;
        transition: .15s
      }

      .textfield::placeholder {
        color: #95a5a6;
        transition: .15s
      }

      .textfield:hover {
        outline-width: 0;
        color: #5d6d77;
        border-color: #5d6d77
      }

      .textfield:hover::-webkit-input-placeholder {
        color: #5d6d77
      }

      .textfield:hover:-ms-input-placeholder {
        color: #5d6d77
      }

      .textfield:hover::-ms-input-placeholder {
        color: #5d6d77
      }

      .textfield:hover::placeholder {
        color: #5d6d77
      }

      .textfield:focus {
        outline-width: 0;
        border-color: #34495e
      }

      .textfield:focus::-webkit-input-placeholder {
        color: #34495e
      }

      .textfield:focus:-ms-input-placeholder {
        color: #34495e
      }

      .textfield:focus::-ms-input-placeholder {
        color: #34495e
      }

      .textfield:focus::placeholder {
        color: #34495e
      }

      // bootstrap3-like grid
      // -----------
      .container {
        padding-left: 3.5%;
        padding-right: 3.5%;
      }

      .container:after,
      .container:before {
        content: " ";
        display: table;
      }

      .container:after {
        clear: both;
      }

      .row {
        margin-left: auto;
        margin-right: auto;
      }

      .row:after,
      .row:before {
        content: " ";
        display: table;
      }

      .row:after {
        clear: both;
      }

      .row .row {
        margin-left: -8px;
        margin-right: -8px;
      }

      /* Ensure images take up the same space when they load */
      /* https://vestride.github.io/Shuffle/images */
      .aspect {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        overflow: hidden;
      }

      .aspect__inner {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
      }

      .aspect--16x9 {
        padding-bottom: 56.25%;
      }

      // bootstrap3-like grid
      .col-1\@xs,
      .col-2\@xs,
      .col-3\@xs,
      .col-4\@xs,
      .col-5\@xs,
      .col-6\@xs,
      .col-1\@sm,
      .col-2\@sm,
      .col-3\@sm,
      .col-4\@sm,
      .col-5\@sm,
      .col-6\@sm,
      .col-7\@sm,
      .col-8\@sm,
      .col-9\@sm,
      .col-10\@sm,
      .col-11\@sm,
      .col-12\@sm,
      .col-1\@md,
      .col-2\@md,
      .col-3\@md,
      .col-4\@md,
      .col-5\@md,
      .col-6\@md,
      .col-7\@md,
      .col-8\@md,
      .col-9\@md,
      .col-10\@md,
      .col-11\@md,
      .col-12\@md {
        position: relative;
        box-sizing: border-box;
        min-height: 1px;
        padding-left: 8px;
        padding-right: 8px;
      }

      .col-1\@xs,
      .col-2\@xs,
      .col-3\@xs,
      .col-4\@xs,
      .col-5\@xs,
      .col-6\@xs {
        float: left;
      }

      .col-1\@xs {
        width: 16.66667%;
      }

      .col-2\@xs {
        width: 33.33333%;
      }

      .col-3\@xs {
        width: 50%;
      }

      .col-4\@xs {
        width: 66.66667%;
      }

      .col-5\@xs {
        width: 83.33333%;
      }

      .col-6\@xs {
        width: 100%;
      }

      @media screen and (min-width: 768px) {
        .col-1\@sm,
        .col-2\@sm,
        .col-3\@sm,
        .col-4\@sm,
        .col-5\@sm,
        .col-6\@sm,
        .col-7\@sm,
        .col-8\@sm,
        .col-9\@sm,
        .col-10\@sm,
        .col-11\@sm,
        .col-12\@sm {
          float: left;
        }

        .col-1\@sm {
          width: 8.33333%;
        }

        .col-2\@sm {
          width: 16.66667%;
        }

        .col-3\@sm {
          width: 25%;
        }

        .col-4\@sm {
          width: 33.33333%;
        }

        .col-5\@sm {
          width: 41.66667%;
        }

        .col-6\@sm {
          width: 50%;
        }

        .col-7\@sm {
          width: 58.33333%;
        }

        .col-8\@sm {
          width: 66.66667%;
        }

        .col-9\@sm {
          width: 75%;
        }

        .col-10\@sm {
          width: 83.33333%;
        }

        .col-11\@sm {
          width: 91.66667%;
        }

        .col-12\@sm {
          width: 100%;
        }

        .container {
          padding-left: 7%;
          padding-right: 7%;
        }

        .row {
          max-width: 1200px;
        }
      }

      @media screen and (min-width: 1024px) {
        .col-1\@md,
        .col-2\@md,
        .col-3\@md,
        .col-4\@md,
        .col-5\@md,
        .col-6\@md,
        .col-7\@md,
        .col-8\@md,
        .col-9\@md,
        .col-10\@md,
        .col-11\@md,
        .col-12\@md {
          float: left;
        }

        .col-1\@md {
          width: 8.33333%;
        }

        .col-2\@md {
          width: 16.66667%;
        }

        .col-3\@md {
          width: 25%;
        }

        .col-4\@md {
          width: 33.33333%;
        }

        .col-5\@md {
          width: 41.66667%;
        }

        .col-6\@md {
          width: 50%;
        }

        .col-7\@md {
          width: 58.33333%;
        }

        .col-8\@md {
          width: 66.66667%;
        }

        .col-9\@md {
          width: 75%;
        }

        .col-10\@md {
          width: 83.33333%;
        }

        .col-11\@md {
          width: 91.66667%;
        }

        .col-12\@md {
          width: 100%;
        }
      }

</style>


<!-- --------------------- FIN SHUFFLE ------------------------- -->

  
</head>
<body>


    <!-- Cabecera -->
    <header class="header bg-primary">
    <a href="{{route('libro.index')}}">
      <h2 class="logo text-light">Libros<strong>Celia</strong></h2>
    </a>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
      
      <a href="{{route('libro.index')}}">Libros</a>
     
      
      <a href="{{url('/aboutUs')}}">Sobre nosotros</a>
      
      @unless (Auth::check())
        <a href="{{route('login')}}">Iniciar sesión</a>
      @endunless
      @auth
          <a href="{{route('libro.admin')}}">Administrador</a>     
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

    




    
    




    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
</body>
</html>