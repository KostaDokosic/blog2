@extends('layout.default')


@section('content')
    <div class="container text-align ">
        <h1 class="mt-2">{{ $post->title }}</h1>
        <img class="mt-5" src="{{ $post->image_url }}" alt="PostImage">
        <p class="mt-5">{{ $post->body }}</p>
    </div>

    <form action="createcomment" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
            <label class="form-label">Enter your comment</label>
            <textarea type="text" class="form-control" name="body" required></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>

    @include('layout.errors')
    @include('layout.session')
    @include('components.comment')
@endsection
