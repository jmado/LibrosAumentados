@extends("../layouts.master")

@section("content")

    <div class="login">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/libros') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a><br>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth            
        @endif
    </div>