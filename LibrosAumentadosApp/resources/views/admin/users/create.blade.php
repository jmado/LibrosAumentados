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
        
            {{--@isset($user)
            <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="formulario">
                @method("PUT")
            @else--}}
            <form action="{{ route('admin.user.store') }}" method="PUT" enctype="multipart/form-data" class="formulario">
            {{--@endisset--}}
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name ?? ''}}" required>    
                </div>
                    
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{$user->email ?? ''}}" required>    
                </div>
{{--
                <div class="form-group">
                    <label for="email">email_verified_at:</label>
                    <input id="email_verified_at" type="text" class="form-control" name="email_verified_at" value="{{$user->email_verified_at ?? ''}}" required>    
                </div>
--}}
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control" name="password" value="{{$user->password ?? ''}}" required>    
                </div>
                
                <div class="form-group">
                    <label for="created_at">created_at:</label>
                    <input id="created_at" type="text" class="form-control" name="created_at" value="{{$user->created_at ?? ''}}" >
                </div>

                <div class="form-group">
                    <label for="update_at">update_at:</label>
                <input id="update_at" type="text" class="form-control" name="update_at" value="{{$user->update_at ?? ''}}" >
                </div>

                
                
               

                <input type="submit" value="Guardar" class="btn btn-primary btn-block" role="button">

            </form>
        
    </div>


@endsection


        