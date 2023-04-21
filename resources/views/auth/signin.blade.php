@extends('layout.default')



@section('content')

<form action="{{ url('signin') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required />
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required />
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>


@include('layout.errors')
@include('layout.session')

@endsection