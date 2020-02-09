@extends("layouts.master")

@section("content")




<section class="text-center">
    <div class="container">    
        <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </div>
</section>


<div class="elementos container">
    
    <div class="cards">
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
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="{{ route('imagen.all', $id) }}" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    1
                </a>
                <h2>
                Imagenes
                </h2>
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
                </a>
                <h2>
                 Galerias
                </h2>
            </div>         
        </div> 
    </div>  
    
    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    3
                </a>
                <h2>
                 Videos
                </h2>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    4
                </a>
                <h2>
                 Audios
                </h2>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    5
                </a>
                <h2>
                 Modelos 3d
                </h2>
            </div>         
        </div> 
    </div> 

    <div class="cards">
        <div class="card">
            
            <div class="card-title">
                <a href="" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                    6
                </a>
                <h2>
                 Otros Archivos
                </h2>
            </div>         
        </div> 
    </div> 
      
</div>

@endsection


        