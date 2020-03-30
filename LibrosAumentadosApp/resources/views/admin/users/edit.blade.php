@extends("layouts.master")

@section("content")


<h1>Prueba</h1>

    <div class="container">
        
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype='multipart/form-data' class="formulario">
        @method("PUT")
        @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{$user->name ?? ''}}" required>    
            </div>
                
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input id="email" type="text" class="form-control" name="email" value="{{$user->email ?? ''}}" required>    
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" type="password" class="form-control" name="password" {{--value="{{$user->password ?? ''}}" required--}}>    
            </div>
            
            <input type="submit" value="Guardar" class="btn btn-primary btn-block" role="button">

        </form>
        
    </div>

@endsection