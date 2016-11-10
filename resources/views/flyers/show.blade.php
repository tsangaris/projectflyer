@extends('layout')

@section('content')
  <div class="row">

    <div class="col-md-4">
      <h1>{{ $flyer->street }}</h1>
      <h2>{!! $flyer->price !!}</h2>

      <hr>

      <div class="description">
        {!! $flyer->description !!}
      </div>
    </div>

    <div class="col-md-8 gallery">
      @foreach($flyer->photos->chunk(4) as $set)
        <div class="row">
          @foreach ($set as $photo)
            <div class="col-md-3 gallery__image">
              <img src="\{{ $photo->thumbnail_path }}">
            </div>
          @endforeach
        </div>
      @endforeach
    </div>

  </div>

  <hr>

  <h2>Add your photos</h2>


  <form id="addPhotosForm"
        class="dropzone"
        action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
        method="POST"
        >

      {{ csrf_field() }}
  </form>

@endsection
