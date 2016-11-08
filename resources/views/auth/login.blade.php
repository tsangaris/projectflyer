@extends('layout')

@section('title', '|Login')


@section('content')

  <div class="col-md-6 col-md-offset-3">
    <h1>Login</h1>

    <hr>

    @include('includes.errors')

    {{-- Place the Login Form --}}
    <form method="POST" action="{{ url('/login') }}" class="form-group" id="">

      {!! csrf_field() !!}


      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
      </div>


      <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>

    </form>
  </div>
@endsection
