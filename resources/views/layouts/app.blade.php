<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title')</title>
    @section('stylesheets')@show
</head>
<body>
@section('header')
    <nav class="site-header sticky-top py-1 bg-dark">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="d-block mx-auto">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                    <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                    <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                    <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                    <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                    <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                </svg>
            </a>
            @if (\Auth::check())
                <a class="py-2 d-none d-md-inline-block" href="{{ url('/logout') }}">Log out</a>
                <a class="py-2 d-none d-md-inline-block" href="{{ route('posts.create') }}">Create Post</a>
            @else
                <a class="py-2 d-none d-md-inline-block" href="{{ route('registerForm') }}">Register</a>
                <a class="py-2 d-none d-md-inline-block" href="{{ route('loginForm') }}">Sign In</a>
            @endif
            <a class="py-2 d-none d-md-inline-block" href="{{ route('posts') }}">Posts</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
        </div>
    </nav>
@show

@yield('content')

</body>
</html>
