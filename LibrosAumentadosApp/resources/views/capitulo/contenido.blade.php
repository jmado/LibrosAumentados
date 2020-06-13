@extends("layouts.master")

@section("content")

<!-- Plugin javascript para hacer paginaciones -->
<script src="{{ URL::asset('js/pagination.min.js')}}"></script>
<script src="{{ URL::asset('js/shuffle.min.js')}}"></script>

<script>
      var Shuffle = window.Shuffle;

      class Demo {
        constructor(element) {
          this.element = element;
          this.shuffle = new Shuffle(element, {
            itemSelector: '.picture-item',
            sizer: element.querySelector('.my-sizer-element'),
          });

          // Log events.
          this.addShuffleEventListeners();
          this._activeFilters = [];
          this.addFilterButtons();
          this.addSorting();
          this.addSearchFilter();
        }

        /**
        * Shuffle uses the CustomEvent constructor to dispatch events. You can listen
        * for them like you normally would (with jQuery for example).
        */
        addShuffleEventListeners() {
          this.shuffle.on(Shuffle.EventType.LAYOUT, (data) => {
            console.log('layout. data:', data);
          });
          this.shuffle.on(Shuffle.EventType.REMOVED, (data) => {
            console.log('removed. data:', data);
          });
        }

        addFilterButtons() {
          const options = document.querySelector('.filter-options');
          if (!options) {
            return;
          }
          
          const filterButtons = Array.from(options.children);
          const onClick = this._handleFilterClick.bind(this);
          filterButtons.forEach((button) => {
            button.addEventListener('click', onClick, false);
          });
        }

        _handleFilterClick(evt) {
          const btn = evt.currentTarget;
          const isActive = btn.classList.contains('active');
          const btnGroup = btn.getAttribute('data-group');
          
          this._removeActiveClassFromChildren(btn.parentNode);
          
          let filterGroup;
          if (isActive) {
            btn.classList.remove('active');
            filterGroup = Shuffle.ALL_ITEMS;
          } else {
            btn.classList.add('active');
            filterGroup = btnGroup;
          }
          
          this.shuffle.filter(filterGroup);
        }

        _removeActiveClassFromChildren(parent) {
          const { children } = parent;
          for (let i = children.length - 1; i >= 0; i--) {
            children[i].classList.remove('active');
          }
        }

        addSorting() {
          const buttonGroup = document.querySelector('.sort-options');
          if (!buttonGroup) {
            return;
          }
          buttonGroup.addEventListener('change', this._handleSortChange.bind(this));
        }

        _handleSortChange(evt) {
          // Add and remove `active` class from buttons.
          const buttons = Array.from(evt.currentTarget.children);
          buttons.forEach((button) => {
            if (button.querySelector('input').value === evt.target.value) {
              button.classList.add('active');
            } else {
              button.classList.remove('active');
            }
          });
          
          // Create the sort options to give to Shuffle.
          const { value } = evt.target;
          let options = {};
          
          function sortByDate(element) {
            return element.getAttribute('data-created');
          }
          
          function sortByTitle(element) {
            return element.getAttribute('data-title').toLowerCase();
          }
          
          if (value === 'date-created') {
            options = {
              reverse: true,
              by: sortByDate,
            };
          } else if (value === 'title') {
            options = {
              by: sortByTitle,
            };
          }
          this.shuffle.sort(options);
        }

        // Advanced filtering
        addSearchFilter() {
          const searchInput = document.querySelector('.js-shuffle-search');
          if (!searchInput) {
            return;
          }
          searchInput.addEventListener('keyup', this._handleSearchKeyup.bind(this));
        }

        /**
        * Filter the shuffle instance by items with a title that matches the search input.
        * @param {Event} evt Event object.
        */
        _handleSearchKeyup(evt) {
          const searchText = evt.target.value.toLowerCase();
          this.shuffle.filter((element, shuffle) => {
            // If there is a current filter applied, ignore elements that don't match it.
            if (shuffle.group !== Shuffle.ALL_ITEMS) {
              // Get the item's groups.
              const groups = JSON.parse(element.getAttribute('data-groups'));
              const isElementInCurrentGroup = groups.indexOf(shuffle.group) !== -1;
              // Only search elements in the current group
              if (!isElementInCurrentGroup) {
                return false;
              }
            }
            const titleElement = element.querySelector('.picture-item__title');
            const titleText = titleElement.textContent.toLowerCase().trim();
            return titleText.indexOf(searchText) !== -1;
          });
        }
      }

      document.addEventListener('DOMContentLoaded', () => {
        window.demo = new Demo(document.getElementById('grid'));
      });
</script>




<div class="jumbotron">
  <div class="row">
    <!-- Libro -->
        <div class="col col-12 col-lg-8">
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
                      </div>
                    </div>
        </div>
        <!--FIN Libro-->
        <div class="col col-lg-3">
            <div class="libro-login">
                <p class="text-info">Escribe la palabra {{$mensage_login["palabra"]}} del párrafo {{$mensage_login["parrafo"]}} de la página {{$mensage_login["pagina"]}} del capítulo {{$mensage_login["capitulo"]}}</p>
                <p class="mensage-login-error"></p>
                
                  <input id="pass" type="text" name="password" class="login form-control"  placeholder="Palabra">
                  <button class="login btn btn-info btn-block" id="login-btn">Acceder</button>
            </div>
        </div>
  </div>

  <hr class="my-4">

  <div class="row row-indice">
        <div class="col col-12">
                
                <div class="card">
                      <div class="card-header">
                          <p class="text-center"> Lista de capitulos</p>
                          <div id="pagination-demo"></div>
                      </div>
                      <div class="card-body">
                          <div class="data-container"></div>
                      </div>
                </div>
                
        </div>
  </div>
</div>



    













    






<div class="container">
  {{-- 
        <div class="row">
          <div class="col-12@sm">
            <h1>Capitulo</h1>
          </div>
        </div>
      </div>
  --}}
      <div class="container">
        <div class="row">
          <div class="col-4@sm col-3@md">
            <div class="filters-group">
              <label for="filters-search-input" class="filter-label">Buscar:</label>
              <input class="textfield filter__search js-shuffle-search form-control" type="search" id="filters-search-input" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12@sm filters-group-wrap">
            <div class="filters-group">
              <p class="filter-label">Filta por:</p>
              <div class="btn-group filter-options">
                <button class="btn btn--primary" data-group="audios">Audios</button>
                <button class="btn btn--primary" data-group="galerias">Galerias</button>
                <button class="btn btn--primary" data-group="imagenes">Imagenes</button>
                <button class="btn btn--primary" data-group="modelos">Modelos 3D</button>
                <button class="btn btn--primary" data-group="videos">Videos</button>
                <button class="btn btn--primary" data-group="otros">Otros</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div id="grid" class="row my-shuffle-container">
        <!--Elementos imagen-->
        @foreach($imagenes[0] as $imagen)
          <figure class="col-3@xs col-4@sm col-4@md picture-item" data-groups='["imagenes"]' data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
              <div class="aspect aspect--16x9">
                <div class="aspect__inner bg-info">
                <img src="{{URL::asset($imagen->imagen)}}"/>
                </div>
              </div>
              <div class="picture-item__details">
                <figcaption class="picture-item__title"><a href="{{URL::asset($imagen->imagen)}}" target="_blank" rel="noopener">{{$imagen->titulo}} </a></figcaption>
                <p class="picture-item__tags hidden@xs">Imagen</p>
              </div>
              <p class="picture-item__description">{{$imagen->descripcion}}</p>
            </div>
          </figure>
        @endforeach
        <!--Elementos audio-->
        @foreach($audios[0] as $audio)
          <figure class="col-3@xs col-4@sm col-4@md picture-item" data-groups='["audios"]' data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
              <div class="aspect aspect--16x9">
                <div class="aspect__inner bg-info" style="display:flex; justify-content: center; align-items: center;">
                <audio src="{{URL::asset($audio->archivo)}}" controls style="width:80%;"></audio>
                </div>
              </div>
              <div class="picture-item__details">
                <figcaption class="picture-item__title"><a target="_blank" rel="noopener" class="text-info">{{$audio->titulo}} </a></figcaption>
                <p class="picture-item__tags hidden@xs">Audio</p>
              </div>
              <p class="picture-item__description">{{$audio->descripcion}}</p>
            </div>
          </figure>
        @endforeach
        <!--Elementos modelo 3D -->
        @foreach($modelos[0] as $modelo)
          <figure class="col-3@xs col-4@sm col-4@md picture-item" data-groups='["modelos"]' data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
              <div class="aspect aspect--16x9">
                <div class="aspect__inner bg-info">
                <img src="{{ url('complementos/iconos/modelo.png') }}"/>
                </div>
              </div>
              <div class="picture-item__details">
                <figcaption class="picture-item__title"><a href="#" target="_blank" rel="noopener">{{$modelo->titulo}} </a></figcaption>
                <p class="picture-item__tags hidden@xs">Modelo 3D</p>
              </div>
              <p class="picture-item__description">{{$modelo->descripcion}}</p>
            </div>
          </figure>
        @endforeach
        <!--Elementos galeria -->
        @foreach($galerias[0] as $galeria)
          <figure class="col-3@xs col-4@sm col-4@md picture-item" data-groups='["galerias"]' data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
              <div class="aspect aspect--16x9">
                <div class="aspect__inner bg-info">
                <img src="{{URL::asset($galeria->cubierta)}}"/>
                </div>
              </div>
              <div class="picture-item__details">
                <figcaption class="picture-item__title"><a href="#" target="_blank" rel="noopener">{{$galeria->titulo}} </a></figcaption>
                <p class="picture-item__tags hidden@xs">Galeria</p>
              </div>
              <p class="picture-item__description">{{$galeria->descripcion}}</p>
            </div>
          </figure>
        @endforeach
        <!--Elementos video -->
        @foreach($videos[0] as $video)
          <figure class="col-3@xs col-4@sm col-4@md picture-item" data-groups='["videos"]' data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
              <div class="aspect aspect--16x9">
                <div class="aspect__inner bg-info">
                <img src="{{ url('complementos/iconos/video.png') }}"/>
                
                </div>
              </div>
              <div class="picture-item__details">
                <figcaption class="picture-item__title"><a href="{{URL::asset($imagen->imagen)}}" target="_blank" rel="noopener">{{$video->titulo}} </a></figcaption>
                <p class="picture-item__tags hidden@xs">Video</p>
              </div>
              <p class="picture-item__description">{{$video->descripcion}}</p>
            </div>
          </figure>
        @endforeach
        <!--Elementos otro -->
        @foreach($descargas[0] as $descarga)
          <figure class="col-3@xs col-4@sm col-4@md picture-item" data-groups='["otros"]' data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
              <div class="aspect aspect--16x9">
                <div class="aspect__inner bg-info">
                <img src="{{ url('complementos/iconos/descargas.png') }}"/>
                </div>
              </div>
              <div class="picture-item__details">
                <figcaption class="picture-item__title"><a href="#" target="_blank" rel="noopener">{{$descarga->titulo}} </a></figcaption>
                <p class="picture-item__tags hidden@xs">Otros</p>
              </div>
              <p class="picture-item__description">{{$descarga->descripcion}}</p>
            </div>
          </figure>
        @endforeach
          <div class="col-1@sm col-1@xs my-sizer-element"></div>
        </div>
      </div>



<script>
//Login
let pass = false;
      $(function(){  
            $('#login-btn').click(function(){
                if($('#pass').val()){
                    let search = $('#pass').val();
                    $.ajax({
                        url: "{{ route('contenido.loginConfirma') }}",
                        type: 'POST',
                        data: {search: search},
                        success: function(response){
                        console.log("f2");
                              tasks = JSON.parse(response);
                              console.log(tasks);

                              if(tasks == 1){
                                console.log("correcto" + tasks);
                                pass = true;
                                console.log("correcto");
                                
                              }else{
                                console.log("incorrecto" + tasks);
                                pass = false;
                                console.log("incorre");
                              } 
                              console.log("respuesta");  
                        }
                    });
                }else{
                  console.log("2");
                  $('.mensage-login-error').html("Escribe una palabra");   
                }
                console.log("fin");
          });
      });




    var capitulos = @json($capitulos);
    //---------------------------------------------------Paginación del indice de capitulos 
    
      $('.c1').hide();

    //Paginacion de capitulos
    $(function() {
          (function(name) {
            var container = $('#pagination-' + name);
            container.pagination({
              dataSource: capitulos,
              locator: 'items',
              //totalNumber: 50,
              pageSize: 6,
                    showPageNumbers: false,
                    showPrevious: true,
                    showNext: true,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
              ajax: {
                beforeSend: function() {
                  container.prev().html('Cargando ...');
                }
              },
              callback: function(response, pagination) {
                //window.console && console.log(22, response, pagination);

                //Template
                var dataHtml = `
                <div class="list-group">
                    <a class="list-group-item list-group-item-action active text-light">Indice</a>`;
        
                $.each(response, function (index, item) {
                  
                  dataHtml += `<button type="button" class="c`+item.id+` list-group-item list-group-item-action">Capitulo `+item.numero_orden+` : ` + item.titulo + `</button>`;
                });
        
                dataHtml += '';
                //End template
                container.prev().html(dataHtml);
              }
            })
          })('demo');
    })
    //--------------------------------------------FIN de la paginación del indice de capitulos


</script>

@endsection