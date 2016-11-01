@extends('layout')

@section('content')

  <h1>{{ $flyer->street }}</h1>
  <h2>{!! $flyer->price !!}</h2>
  <hr>

  <div class="description">
    {!! $flyer->description !!}
  </div>

@endsection
