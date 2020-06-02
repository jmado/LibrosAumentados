<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>
        
        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/startmin.css') }}" rel="stylesheet">
  
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inicie sesión</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" type="email" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" type="password" value="" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Recuérdame
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Siguiente</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

    </body>
</html>




