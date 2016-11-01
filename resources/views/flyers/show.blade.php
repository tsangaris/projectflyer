@extends('layout')

@section('content')

  <h1>{{ $flyer->street }}</h1>
  <h2>{!! $flyer->price !!}</h2>
  <hr>

  <div class="description">
    {!! $flyer->description !!}
  </div>


  <form class="dropzone"
        action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos"
        method="POST">
        
      {{ csrf_field() }}
  </form>

@endsection
