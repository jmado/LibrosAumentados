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
                        <li>
                          <a href="{{ route('contenido.contenido', $l->id) }}">
                            {{$l->titulo}}
                          </a>
                        </li>
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
              <div class="card-body" id="body{{$capitulo->id}}">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="imagenes" aria-selected="true">Imagenes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="galerias-tab" data-toggle="tab" href="#galerias" role="tab" aria-controls="galerias" aria-selected="false">Galerias</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="audios-tab" data-toggle="tab" href="#audios" role="tab" aria-controls="audios" aria-selected="false">Audios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="descargas-tab" data-toggle="tab" href="#descargas" role="tab" aria-controls="descargas" aria-selected="false">Descargas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="modelos-tab" data-toggle="tab" href="#modelos" role="tab" aria-controls="modelos" aria-selected="false">Modelos 3d</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">

  </div>
  <div class="tab-pane fade" id="galerias" role="tabpanel" aria-labelledby="galerias-tab">

  </div>
  <div class="tab-pane fade" id="audios" role="tabpanel" aria-labelledby="audios-tab">

  </div>
  <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">

  </div>
  <div class="tab-pane fade" id="descargas" role="tabpanel" aria-labelledby="descargas-tab">

  </div>
  <div class="tab-pane fade" id="modelos" role="tabpanel" aria-labelledby="modelos-tab">

  </div>
</div>
              





                {{-- 
                        <div class="row">
                          <div class="col">
                            <a href="#" title="Imágenes" class="orden-imagen">
                              <i class="far fa-image"></i>
                            </a> 
                          </div>
                          <div class="col">
                            <a href="#" title="Galerías" class="orden-galeria">
                              <i class="far fa-images"></i>
                            </a>
                          </div>
                          <div class="col">
                            <a href="#" title="Audios" class="orden-audio">
                              <i class="fas fa-volume-up"></i>
                            </a>
                          </div>
                          <div class="col">
                            <a href="#" title="Videos" class="orden-video">
                              <i class="fas fa-video"></i>
                            </a>
                          </div>
                          <div class="col">
                            <a href="#" title="Descargas" class="orden-descarga">
                              <i class="fas fa-file-download"></i>
                            </a>
                          </div>
                          <div class="col">
                            <a href="#" title="Modelos 3d" class="orden-modelo">
                              <i class="fas fa-cube"></i>
                            </a>
                          </div>
                        </div>
                        <div class="row" id="orden-multimedia">
                        </div>
                --}}
              </div>

              
            </div>
          @endforeach



        </div>
        <script>
          let pass = false;
          $(function(){
          $('.card-body').hide();  
      //$('.accordion').hide(); 
      //$('#headingThree').html("hola mondo");    
    //let pass = false;
          $('#login-btn').click(function(){
            if($('#pass').val()){
                let search = $('#pass').val();
                console.log(search);
                $.ajax({
                    url: "{{ route('contenido.loginConfirma') }}",
                    type: 'POST',
                    data: {search: search},
                    success: function(response){

                          tasks = JSON.parse(response);
                          console.log(tasks);

                          if(tasks == 1){
                            console.log("correcto" + tasks);
                            pass = true;
                            $('.mensage-login-valido').html("Palabra correcta");
                            $('.libro-login').hide(); 
                          }else{
                            console.log("incorrecto" + tasks);
                            pass = false;
                            $('.mensage-login-error').html("Palabra incorrecta");
                          }   
                    }
                });
            }else{
              $('.mensage-login-error').html("Escribe una palabra");   
            }


      
       
        
        });


//Multimedia de los capitulos
        let interruptor = 0;
        $('.card-header').click(function(e){
          //if(pass!=true){
          //  $('.mensage-login-error').html("Escribe la palabra para acceder al contenido");  
          //}
          //else{
            
            identificador = "#body"+ $(this).attr("id");
            //console.log(identificador);
            if(interruptor == 0){
              interruptor = 1;
              $(identificador).show();
              

              capitulo_id = identificador.substring(5);
              console.log(capitulo_id);
              $.ajax({
                url: "{{ route('contenido.multimedia') }}",
                type: 'POST',
                data: {capitulo_id: capitulo_id},
                success: function(response){

                      tasks = JSON.parse(response);
                               
                      var template = '';
                      
                      
                      //imagenes
                      tasks["imagenes"].forEach(task => {
                        template += "<div class='row'><div class='col col-12 col-md-6 col-lg-4'><a href='../../"+task.imagen+"'><img src='../../"+task.imagen+"' alt='logo del elemento'></a></div><div class='col col-12 col-md-6 col-lg-8 p-5'><div class='row '><h5>"+task.titulo+"</h5></div><div class='row'><p>"+task.descripcion+"</p></div></div></div>";
                        /*
                        template += "<button type='button' class='btn btn-primary p-5' data-toggle='modal' data-target='#m"+task.id+"'>Launch demo modal</button>";
                        template +="<div class='modal fade' id='m"+task.id+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Modal title</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>Woohoo, you're reading this text in a modal!</div></div></div></div>";
                        */
                      });
                      

                      $('#imagenes').html(template);
                      template = '';


                      //galerias
                      tasks["galerias"].forEach(task => { 
                        template += "<div class='row'><div class='col col-12 col-sm-6 col-md-4 col-lg-2'><a href='../galeria/"+task.id+"'><img src='../../"+task.cubierta+"' alt='logo del elemento'></a></div><div class='col col-12 col-sm-6 col-md-8 col-lg-10 p-5'><div class='row'><h5>"+task.titulo+"</h5></div><div class='row'><p>"+task.descripcion+"</p></div></div></div>";
                      });
                      $('#galerias').html(template);
                      template = '';


                      //audios
                      tasks["audios"].forEach(task => { 
                        template += "<div class='row'><div class='col col-12 col-md-7 col-lg-5'><audio controls><source src='../../"+task.archivo+"' type='audio/mp3'><source src='../../"+task.archivo+"' type='audio/ogg'><source src='../../"+task.archivo+"' type='audio/mpeg'></audio></div><div class='col col-12 col-md-5 col-lg-6 p-3'><div class='row'><h5>"+task.titulo+"</h5></div><div class='row'><p>"+task.descripcion+"</p></div></div></div>";  
                      });
                      $('#audios').html(template);
                      template = '';


                      //videos
                      tasks["videos"].forEach(task => { 
                        template += "<div class='row p-3'><div class='col col-12'><h5>"+task.titulo+"</h5></div><div class='col col-12'><p>"+task.descripcion+"</p></div><div class='col col-12'><a href='../video/"+task.id+"' class='btn  btn-primary' role='button'>Ver</a></div></div>";
                      });
                      $('#videos').html(template);
                      template = '';


                      //descargas
                      tasks["descargas"].forEach(task => {
                        template += "<div class='row p-3'><div class='col col-12'><h5>"+task.titulo+"</h5></div><div class='col col-12'><p>"+task.descripcion+"</p></div><div class='col col-12'><a href='../descarga/"+task.id+"' class='btn  btn-primary' role='button'>Ver</a></div></div>";
                      });
                      $('#descargas').html(template);
                      template = '';


                      //modelos
                      tasks["modelos3d"].forEach(task => {
                        template += "<div class='row p-3'><div class='col col-12'><h5>"+task.titulo+"</h5></div><div class='col col-12'><p>"+task.descripcion+"</p></div><div class='col col-12'><a href='../modelo/"+task.id+"' class='btn btn-primary' role='button'>Ver</a></div></div>";
                      });
                      
                      $('#modelos').html(template);
                      template = '';

                     

                      
                }
            });


              
            }else{
              interruptor = 0;
              $(identificador).hide();
            }
            
          //}
        })
/*
        function plantilla(datos){
          template = "";
          foreach(datos as dato){
template += "<div class='row'><div class='col col-2'><img src='"+dato[archivo]+"' alt='logo del elemento'></div><div class='col col-10'><div class='row'><h5>"+dato[titulo]+"</h5></div><div class='row'><p>"+dato[descripcion]+"</p></div></div></div>";
          }
          return 
        }
        */

    });
    
    
  </script>      




    </div>

@endsection