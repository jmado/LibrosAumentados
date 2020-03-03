<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <script src="{{ URL::asset('js/appWelcome.js') }}"></script>
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <style>
        nav{
            height:10%;
            width: 100%;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;   
        }
        
        .content{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            position: fixed;
            top: 30%;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 80%;
            padding: 20px;
            text-align:center;
        }
        
        /* Style the button used to pause/play the video */
        #myBtn {
            width: 100%;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;   
        }
        
        #myBtn:hover {
            background: #ddd;
           
        } 
    </style>
    
</head>
<body>
    

   

    <!-- The video -->
    <div class="content">
        <video autoplay muted loop id="myVideo">
            <source src="{{ URL::asset('complementos/videos/bg.mp4') }}" type="video/mp4">
        </video>
    

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="#" class="navbar-brand">LibrosAumentados</a>
        </nav>

        <!-- Optional: some overlay text to describe the video -->
        <main class="card">
            <!-- Use a button to pause/play the video with JavaScript --> 
            <a href="{{route('libro.index')}}" id="myBtn" class="btn btn-dark bg-dark">Entrar</a>
            <h1>Una nueva forma de disfrutar los libros</h1>
            <p>Accede y disfruta de nuestro contenido multimedia de los distintos libros.</p>
            
        </main> 

    </div>
        
    
    










    
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous">
    </script>

    
    <script src="app.js"></script>

</body>
</html>