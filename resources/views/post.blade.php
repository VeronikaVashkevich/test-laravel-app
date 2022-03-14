@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('stylesheets')
    <style>
        .fs-24 {
            font-size: 24px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="post card" style="width: 100%">
            <img src="{{ $post->image }}" alt="post image" class="card-img-top">
            <div class="card-body">
                <div class="post-title card-title">
                    <h1 class="text-center">{{ $post->title }}</h1>
                </div>
                <div class="post-title card-title">
                    <h3 class="text-center">Author: {{ $post->user->name }}</h3>
                </div>
                <div class="post-title card-title">
                    <h4 class="text-center">Date: {{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}</h4>
                </div>
                <div class="card-text fs-24">{{ $post->text }}</div>
            </div>
        </div>
    </div>
@endsection
