
@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))

  <div class="alert alert-success">
    <p> {{ $message }} </p>
  </div>
@endif
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-5">
      <h1>review2U Topic</h1>
  </div>
  <div class="col-md-3">
      <form action="/searchs" method="get">
          <div class="input-group">
              <input type="search" name="search" class="form-control">
              <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"> Search </button>
              </span>
          </div>
      </form>
    </div>

  <div class="col-md-1 text-right">
    <a href=" {{ action('PostController@create') }}" class="btn btn-primary"> NEW TOPIC </a>
  </div>
</div>
<br>
<div class="row">

  <div class="col-md-3"></div>
    <div class="col-md-6 offset-md-3">
        @if( $message = Session::get ('danger') )
            <div class="alert alert-danger">
              <strong> {{ $message }} </strong>
            </div>
        @endif

        <form action=" {{ action('PostController@store') }} " method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label> Name </label>
                <input class="form-control" type="text" name="name" placeholder="Name" />
            </div>
            <div class="form-group">
                <label> Datail </label>
                <textarea class="form-control" name="detail" placeholder="Detail"></textarea>
            </div>
            <div class="form-group">
                <label> Author </label>
                <input class="form-control" type="text" name="author" placeholder="User" />
            </div>
            <button class="btn btn-primary" type="submit"> Submit </button>
        </form>
    </div>

</div>
@endsection
