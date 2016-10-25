@extends('layout')

@section('content')

  <h1>Selling your home?</h1>

  <hr>

  <div class="row">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }} </li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action=" {{ route('flyers.store') }}" method="POST" enctype="multipart/form-data" class="col-md-6">
      @include('flyers.form')
    </form>
  </div>

@endsection
