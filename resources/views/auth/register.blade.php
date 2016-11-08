@extends('layout')

@section('title', '|Register')


@section('content')

  <div class="col-md-6 col-md-offset-3">
    <h1>Register</h1>

    <hr>

    @include('includes.errors')

    {{-- Place the Registration Form --}}
    <form method="POST" action="{{ url('/register') }}" class="form-group" id="">

      {!! csrf_field() !!}

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
      </div>

      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>

    </form>
  </div>
@endsection
