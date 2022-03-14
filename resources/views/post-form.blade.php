@extends('layouts.app')

@section('title') All posts @endsection

@section('content')
    <div class="container d-flex flex-column">
        <div class="text-center">
            <h1>Create post</h1>
        </div>
        <div class="form d-flex justify-content-center">
            <form action="{{ route('posts.store') }}" method="post" style="width: 80%" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="text" class="form-label">Text</label>
                    <textarea name="text" id="text" class="form-control"></textarea>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>
        </div>
    </div>
@endsection
