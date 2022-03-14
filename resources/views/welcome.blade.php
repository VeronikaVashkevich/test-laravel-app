<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Laravel</title>
</head>
<body class="container">
@if (\Auth::check())
    <h1>Hello {{ \Auth::user()->name }}</h1>
    <a href="{{ url('/logout') }}">Log out</a>
@else
    <div class="mb-3">
        <a href="{{ route('registerForm') }}">Register</a>
        <a href="{{ route('loginForm') }}">Sign In</a>
    </div>
@endif
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        {{--        <th scope="col">Handle</th>--}}
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{--        <td>@mdo</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
