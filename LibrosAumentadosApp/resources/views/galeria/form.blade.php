@extends("../layouts.master")

@section("content")


<div class="container p-5">
    <section class="text-center">
        <div class="container">    
            <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atrás</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            
        </div>
    </section>



    <div class="container contenido">
        @isset($galeria)
            <form action="{{ route('galeria.update', ['galerium' => $galeria->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
            @method("PUT")
        @else
            <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @endisset
            @csrf


            <div class="grid-container">

                <div class="item item1">
                    <label for="title">Título:</label>
                    <input id="title" type="text" name="titulo" class="form-control" value="{{$galeria->titulo ?? ''}}" required>
                </div>

                <div class="item item2">
                    <!--Buscador de imagenes-->
                    <div class="buscador-grid">
                        <input type="text" name="buscador" id="buscador" placeholder="Buscador de imagenes">
                    </div>
                    
                    <div class="grid-container2">
                        
                        <!-- Listado de imagenes-->
                        @foreach ($imagenes as $imagen)
                            @isset($galeria)
                                @if($galeria->imagenes()->get()->contains($imagen->id))
                                    <div class="custom-control custom-checkbox image-checkbox image-grid">
                                        <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]" checked>
                                        <label class="custom-control-label" for="i{{$imagen->id}}">
                                            <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                        </label>
                                    </div>
                                @else
                                    <div class="custom-control custom-checkbox image-checkbox image-grid">
                                        <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]">
                                        <label class="custom-control-label" for="i{{$imagen->id}}">
                                            <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                        </label>
                                    </div>
                                @endif
                            @else
                                <div class="custom-control custom-checkbox image-checkbox image-grid">
                                    <input type="checkbox" class="custom-control-input" id="i{{$imagen->id}}" value="{{$imagen->id}}" name="imagenes_id[]">
                                    <label class="custom-control-label" for="i{{$imagen->id}}">
                                        <img src="{{ url($imagen->imagen) }}" alt="{{$imagen->titulo}}" class="img-fluid">
                                    </label>
                                </div>
                            @endisset
                        @endforeach   
                    
                    </div>

                </div>

                <div class="item item3">
                    <label for="info">Descripción:</label>
                    <input id="info" type="text" name="descripcion" class="form-control" value="{{$galeria->descripcion ?? ''}}" required>
                </div> 

                <div class="item item4">
                    <p>Tipo de galeria</p>
                    @isset($galeria)
                        @if($galeria->tipo == "normal")
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo-normal" value="normal" checked>
                                <label class="form-check-label" for="tipo-normal">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo-transparente" value="transparencia">
                                <label class="form-check-label" for="tipo-transparente">Transparente</label>
                            </div>
                        @else
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo-normal" value="normal">
                                <label class="form-check-label" for="tipo-normal">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo-transparente" value="transparencia" checked>
                                <label class="form-check-label" for="tipo-transparente">Transparente</label>
                            </div>
                        @endif
                    @else
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="tipo-normal" value="normal">
                            <label class="form-check-label" for="tipo-normal">Normal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="tipo-transparente" value="transparencia">
                            <label class="form-check-label" for="tipo-transparente">Transparente</label>
                        </div>
                    @endisset
                </div>

                <div class="item item5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="cubierta">
                        <label class="custom-file-label" for="customFileLang">Seleccionar cubierta</label>
                    </div>
                </div>

                <div class="item item6">
                    <input type="submit" value="Enviar" class="btn btn-primary btn-block" role="button">
                </div>
        
            </div>


    
           
    </div>


</div>

<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
                
        let tasks;
        $('#buscador').keyup(function(){
                if($('#buscador').val()){
                    let search = $('#buscador').val();
                    console.log(search);
                    $.ajax({
                              url: "{{ route('galeria.buscador') }}",
                              type: 'POST',
                              data: {search: search},
                              success: function(response){
                                console.log(response);
                                  tasks = JSON.parse(response);
                                  console.log(tasks);
                                      let template = '';
                                      
                                      
                                      tasks.forEach(task => {

                                          template += "hola";
                                      });
                                      $('.grid-container2').html(template);
                                      //$('.search-libros').show();
                                    }
                        });
                }
        });
    });
</script>




@endsection





  

