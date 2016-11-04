@extends('layout')

@section('content')

  <h1>Selling your home?</h1>

  <hr>

  @include('includes.errors')

  <form action="{{ route('flyers.store') }}" method="POST">
    @include('flyers.form')
  </form>

@endsection
