@extends('layout')

@section('title')
  Home
@endsection

@section('content')

  <div class="jumbotron">
    <h1>Project Flyer</h1>
    <p>Lorem ipsum my ass!!</p>
    <p><a class="btn btn-primary btn-lg" href="{{ route('flyers.create') }}" role="button">Create a flyer</a></p>
  </div>

@endsection
