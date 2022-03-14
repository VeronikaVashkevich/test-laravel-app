@extends('layouts.app')

@section('title') All posts @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="posts d-flex justify-content-between">
            @foreach($posts as $post)
                <div class="card post" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text overflow-hidden" style="max-height: 200px">{{ $post->text }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Read post</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
