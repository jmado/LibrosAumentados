@extends("layouts.master")

@section("content")

    <!-- Fin de Cabecera -->

    <!--  Arbol de páginas -->            
    <nav  class="arbol">
      <ol class="breadcrumb">
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item">Libros</li>
          <li class="breadcrumb-item active">Libros 1</li>
      </ol>
    </nav>    
    <!--  FIN Arbol de páginas --> 


    <!-- Contenido principal -->
    <div class="container-fluid">
        <div class="row">

          <!-- Buscador de libros -->
            <div class="col col-12 col-lg-3">
                  <form class="search d-block">
                    <input class="form-control" type="search" placeholder="Buscador de libros" aria-label="Search">
                  </form>
                <div class="search">
                    <ul class="libros-ajax">
                        <li>Libro 1</li>
                        <li>Libro 2</li>
                        <li>Libro 3</li>
                        <li>Libro 4</li>
                        <li>Libro 5</li>
                        <li>Libro 6</li>
                        <li>Libro 7</li>
                        <li>Libro 8</li>
                    </ul>
                </div>
            </div>


            <!-- Libro -->
            <div class="col col-12 col-lg-9">
                <!-- Informacion del libro -->
                <div class="row">
                  <div class="imagen-libro col col-12 col-md-3">
                    <img src="cubierta.jpg" class="align-self-center" alt="Cubierta del libro">
                  </div>
                  <div class="col col-12 col-md-9">
                    <div class="libro-body">
                      <h5>Center-aligned media</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    </div>
                    <div class="libro-login">
                      <p class="text-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quibusdam quod vero hic vitae, ab voluptas autem nisi! Exercitationem explicabo tenetur quasi inventore.</p>
                      <p class="mensage-login">Mensage</p>
                      <form class="login form-block">
                        <input class="login form-control" type="search" placeholder="Palabra" aria-label="Search">
                        <button class="login btn btn-info btn-block" type="submit">Acceder</button>
                    </form>
                    </div>
                  </div>
                    <div class="media">
                        
                        <div class="media-body">
                          

                                <!-- Login del libro --
                                <div class="login">
                                    <div class="mensage">
                                        <p class="text-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quibusdam quod vero hic vitae, ab voluptas autem nisi! Exercitationem explicabo tenetur quasi inventore.</p>
                                        <p class="mensage-login">Mensage</p>
                                    </div>
                                    <form class="login form-block">
                                        <input class="login form-control" type="search" placeholder="Palabra" aria-label="Search">
                                        <button class="login btn btn-info btn-block" type="submit">Acceder</button>
                                    </form>   
                                </div>
                                !-- FIN Login del libro -->

                        </div>
                    </div>
                </div>
            </div>
            <!--FIN Libro-->

        </div>
        



        <!-- Lista de capitulos -->
        <div class="accordion" id="accordionExample">


            <div class="card">

              <div class="card-header" id="headingThree">
                <h6>
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-plus"></i>
                  </button>
                  <span class="mensage">Capitulo 1</span>
                </h6>
              </div>

              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">

                  <div class="row">
                    <div class="col col-12 col-md-2">
                      <i class="fas fa-video"></i>
                    </div>
                    <div class="col col-12 col-md-10">
                      <h5>List-based media object</h5>
                      <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                      </p>
                    </div>
                  </div>

                </div>
              </div>

            </div>


          </div>
        




    </div>

@endsection