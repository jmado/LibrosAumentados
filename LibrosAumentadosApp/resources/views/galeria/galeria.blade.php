@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <h1>Galerias</h1>
        <p>
          <a href="{{route('galeria.all', $galeria[0]->capitulo_id)}}" class="btn btn-primary btn-lg" role="button">Ver Galerías</a>
        </p>
      </div>
</section>


<div class="elementos">
    <div class="container">
        <div class="row">
                    
                    @foreach ($imagenes as $imagen)
                    <div class="col-sm-2 imagen_galeria">
                        <div class="img" >
                            <img src="/{{$imagen->imagen}}">
                        </div>
                    </div>   
                    @endforeach
                
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="elemento-body">

                    <p>Titulo: {{$galeria[0]->titulo}}</p>
                    <p>Descripción: {{$galeria[0]->descripcion}}</p>
                    <p>Tipo de galería: {{$galeria[0]->tipo}}</p>
                    <p>Capitulo: {{$galeria[0]->capitulo_id}}</p>

                </div>
            </div>
        </div>
        <div class="row">

            
            <!--Galeria-->
            <div id="mygallery" class="col-sm-12 gallery">
            <div class="images">
                @foreach ($imagenes as $imagen)
                    @if($loop->first)
                        <div class="active galeria-img" style="background-image: url(/{{$imagen->imagen}})"></div>
                    @else
                    <div class="galeria-img" style="background-image: url(/{{$imagen->imagen}})"></div>
                    @endif
                @endforeach
            <!-- Fin galeria-->
                @if($galeria[0]->tipo == "normal")
                    <span class="left" onclick="izquierda()"></span>
                    <span class="right" onclick="derecha()"></span>
                @endif
            </div>
            
            <div class="thumbs">
            @if($galeria[0]->tipo == "normal")    
                @foreach ($imagenes as $imagen)
                    @if($loop->first)
                        <div class="galeria-img active" style="background-image: url(/{{$imagen->imagen}})"></div>
                    @else
                    <div class="galeria-img" style="background-image: url(/{{$imagen->imagen}})"></div>
                    @endif
                @endforeach
            @else
                <div>
                @foreach ($imagenes as $imagen)
                    <input type="range" class="rango" value="50" oninput="transparencia()">
                @endforeach
                </div>   
            @endif    
            </div>
            
          </div>        
        </div>
        <script>
            
            
        </script>             
                        
                        
                                
                    
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    @auth
                        <a href="{{route('galeria.edit', $galeria[0]->id)}}" class="btn btn-sm btn-info" role="button">Modificar</a>
                        <a href="{{route('galeria.delete', $galeria[0]->id)}}" class="btn btn-sm btn-danger" role="button">Borrar</a>
                    @endauth
                </div>
            </div>
        </div>

    </div>    
</div>

            



@endsection