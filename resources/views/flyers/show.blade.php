@extends('layout')

@section('content')
  <div class="row">

    <div class="col-md-3">
      <h1>{{ $flyer->street }}</h1>
      <h2>{!! $flyer->price !!}</h2>

      <hr>

      <div class="description">
        {!! $flyer->description !!}
      </div>
    </div>

    <div class="col-md-9">
      @foreach ($flyer->photos as $photo)
        <img src="{{ $photo->path }}"/>
      @endforeach
    </div>

  </div>

  <hr>

  <h2>Add your photos</h2>


  <form id="addPhotosForm"
        class="dropzone"
        action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos"
        method="POST"
        >

      {{ csrf_field() }}
  </form>

@endsection
