@extends("layouts.master")

@section("content")



<div class="container p-5">
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


    <div class="container">
        
            @isset($capitulo)
            <form action="{{ route('capitulo.update', ['capitulo' => $capitulo->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
                @method("PUT")
            @else
            <form action="{{ route('capitulo.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
            @endisset
                @csrf
                <div class="form-group">
                    <label for="capitulo">Numero de capitulo:</label>
                    <input id="capitulo" type="number" class="form-control" name="numero_orden" value="{{$capitulo->numero_orden ?? ''}}" required>    
                </div>
                    
                <div class="form-group">
                    <label for="title">Titulo:</label>    
                    <input id="title" type="text" class="form-control" name="titulo" value="{{$capitulo->titulo ?? ''}}" required>
                </div>
                
                @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                @endforeach
                @endif   

                <input type="submit" value="Guardar" class="btn btn-primary btn-block" role="button">

            </form>
        
    </div>

</div>


@endsection


        