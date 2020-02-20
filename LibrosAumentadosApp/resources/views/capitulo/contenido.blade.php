@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container"> 
        <p>
            <a href="{{route('capitulo.all', $id_libro)}}" class="btn btn-primary btn-lg" role="button">Ver Capitulos</a>
        </p>
    {{--    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>  
    --}} 
    </div>
</section>


<div class="elementos container">
    
    <div class="cards">
        @auth
            <div class="card">
                <div class="card-title">
                    <a href="{{ route('pagina.all', $id) }}" class="toggle-info btn">
                        <span class="left"></span>
                        <span class="right"></span>
                        1
                    </a>
                    <h2>
                    Paginas
                    </h2>
                </div>         
            </div> 
        @endauth
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('imagen.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    1
                
               
                Imagenes
                </a>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('galeria.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    2
               
               
                 Galerias
                </a>
            </div>         
        </div> 
    </div>  
    
    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('video.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    3
                
                
                 Videos
                 </a>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('audio.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    4
                
                
                 Audios
                </a>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('modelo.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    5
                

                 Modelos 3d
                </a>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('descarga.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    6
                

                 Otros Archivos
                </a>
            </div>         
        </div> 
    </div> 
      
</div>

@endsection


        