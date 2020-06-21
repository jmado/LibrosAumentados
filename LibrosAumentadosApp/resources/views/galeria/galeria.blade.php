@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">
        <h1>Galerías</h1>
            
      </div>
</section>


<div class="elementos">
    <div class="container">
        <div class="row">
                    
                
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="elemento-body">

                    <p>Título: {{$galeria[0]->titulo}}</p>
                    <p>Descripción: {{$galeria[0]->descripcion}}</p>
                    <p>Tipo de galería: {{$galeria[0]->tipo}}</p>

                </div>
            </div>
        </div>
        <div class="row">

            
            <!--Galeria-->
            <div id="mygallery" class="col-sm-12 gallery">
            <div class="images">
            @if (isset($libro_id))
                @foreach ($imagenes as $imagen)
                    @if($loop->first)
                        <div class="active galeria-img imagenes" style="background-image: url('../../{{$imagen->imagen}}')"></div>
                    @else
                    <div class="galeria-img imagenes" style="background-image: url('../../{{$imagen->imagen}}')"></div>
                    @endif
                @endforeach
            @else
                @foreach ($imagenes as $imagen)
                    @if($loop->first)
                        <div class="active galeria-img imagenes" style="background-image: url('../{{$imagen->imagen}}')"></div>
                    @else
                    <div class="galeria-img imagenes" style="background-image: url('../{{$imagen->imagen}}')"></div>
                    @endif
                @endforeach
            @endif
            <!-- Fin galeria-->
                 @if($galeria[0]->tipo == "normal") 
                    <span class="left" onclick="izquierda()"></span>
                    <span class="right" onclick="derecha()"></span>
                 @endif 
            </div>
            
            <div class="thumbs">
            {{-- @if($galeria[0]->tipo == "normal") --}}
                @if (isset($libro_id))       
                    @foreach ($imagenes as $imagen)
                        @if($loop->first)
                            <div class="galeria-img active" style="background-image: url('../../{{$imagen->imagen}}')"></div>
                        @else
                        <div class="galeria-img" style="background-image: url('../../{{$imagen->imagen}}')"></div>
                        @endif
                    @endforeach
                @else
                    @foreach ($imagenes as $imagen)
                        @if($loop->first)
                            <div class="galeria-img active" style="background-image: url('../{{$imagen->imagen}}')"></div>
                        @else
                        <div class="galeria-img" style="background-image: url('../{{$imagen->imagen}}')"></div>
                        @endif
                    @endforeach
                @endif
            {{-- @else --}}
            @if($galeria[0]->tipo == "transparencia")
            <br>
                <div>
                @if(count($imagenes)>2)
                    @foreach ($imagenes as $imagen)
                        <input type="range" class="rango" value="50" oninput="transparencia()">
                    @endforeach
                @else
                    <input type="range" class="rango" value="50" oninput="transparencia()">
                @endif
                </div>   
            @endif    
            </div>
            
          </div>        
        </div>
                     

    </div>    
</div>

            



@endsection