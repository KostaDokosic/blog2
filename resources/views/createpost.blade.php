@extends('layout.default')


@section('content')

<form action="{{ url('create') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title" required />
  </div>
  <div class="mb-3">
    <label class="form-label">Body</label>
    <textarea type="text" name="body" class="form-control" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Image Url</label>
    <input type="text" class="form-control" name="image_url" required />
  </div>
  <button type="submit" class="btn btn-primary">Create Post</button>
</form>


@include('layout.errors')
@include('layout.session')

@endsection