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
                    <input class="form-control libros-input" id="search" type="search" placeholder="Buscador de libros" aria-label="Search">
                  </form>
                <div class="search-libros">
                    <ul class="libros-php">
                      @forelse ($libros as $l)
                        <li>{{$l->titulo}}</li>
                      @empty
                        <li>...</li>
                      @endforelse
                    </ul>
                    
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
            <script>
              $(function(){
                  //$('.search-libros').hide();
                  
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  
              let tasks;
                  $('#search').keyup(function(){
                      if($('#search').val()){
                          let search = $('#search').val();
                          console.log(search);
                          $.ajax({
                              url: "{{ route('contenido.libros') }}",
                              type: 'POST',
                              data: {search: search},
                              success: function(response){
                                
                                  tasks = JSON.parse(response);
                                  console.log(tasks);
                                      let template = '';
                                      
                                      
                                      tasks.forEach(task => {
                                          

                                          template += ` 
                                          <ul class="libros-php"> 
                                              <li>${task.titulo}</li>
                                          </ul> `;
                                      });
                                      $('.search-libros').html(template);
                                      $('.search-libros').show();
                              }
                          });
                      }else{
                          
                      }
                  });

              });
            </script>







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
                    <div class="login-valido">
                      <p class="mensage-login-valido"></p>
                    </div>
                    <div class="libro-login">
                      <p class="text-info">Escribe la palabra {{$mensage_login["palabra"]}} del párrafo {{$mensage_login["parrafo"]}} de la página {{$mensage_login["pagina"]}} del capítulo {{$mensage_login["capitulo"]}}</p>
                      {{-- 
                      <p class="mensage-login"><span>Capítulo:</span>{{$mensage_login["capitulo"]}}</p>
                      <p class="mensage-login"><span>Página:</span>{{$mensage_login["pagina"]}}</p>
                      <p class="mensage-login"><span>Párrafo:</span>{{$mensage_login["parrafo"]}}</p>
                      <p class="mensage-login"><span>Palabra:</span>{{$mensage_login["palabra"]}}</p>
                      --}}
                      <p class="mensage-login-error"></p>
                      

                      {{--<form class="formulario">--}}
                      
                        <input id="pass" type="text" name="password" class="login form-control"  placeholder="Palabra">
                        <button class="login btn btn-info btn-block" id="login-btn">Acceder</button>
                    {{--</form>--}}
                    </div>
          
                  </div>
                   
                </div>
            </div>
            <!--FIN Libro-->

        </div>
        



        <!-- Lista de capitulos -->
        <div class="accordion" id="accordionExample">


          @foreach($capitulos as $capitulo)
            <div class="card" id="{{$capitulo->id}}">

              <div class="card-header" id="{{$capitulo->id}}">
                
              <button class="btn btn-link collapsed">
                  <span class="mensage">{{$capitulo->titulo}}</span>
              </button>
                
              </div>

              
            </div>
          @endforeach



        </div>
        <script>
    $(function(){
      //$('.accordion').hide(); 
      //$('#headingThree').html("hola mondo");    
    let pass = false;
        $('#login-btn').click(function(){
            if($('#pass').val()){
                let search = $('#search').val();
                console.log(search);
                $.ajax({
                    url: "{{ route('contenido.libros') }}",
                    type: 'POST',
                    data: {search: search},
                    success: function(response){
                      
                        if(response == true){
                          pass = true;
                          $('.mensage-login-valido').html("Palabra correcta");
                        }else{
                          pass = false;
                          $('.mensage-login-error').html("Palabra incorrecta");
                        }   
                    }
                });
            }else{
              $('.mensage-login-error').html("Escribe una palabra");   
            }


        $('.card-header').click(function(){
          alert("hola");
        })
       
        
        });

    });
    
  </script>      




    </div>

@endsection