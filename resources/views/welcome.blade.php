@extends('layouts.app')

@section('title') Welcome @endsection

@section('content')
    <div class="container">
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
    </div>
@endsection
