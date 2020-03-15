
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
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-bordered">
    <thead>
      <tr>
          <th>No</th>
          <th>Name</th>
          <th>Detail</th>
          <th>Author</th>
          <th width ="80">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td> {{ $post->id }} </td>
            <td> {{ $post->name }} </td>
            <td> {{ $post->detail }} </td>
            <td> {{ $post->author }} </td>
            <td>

                <form action=" {{ action('PostController@destroy', $post->id )}} " method="post">
                  <a href=" {{ action('PostController@show', $post->id )}} " class="btn btn-info"> Show </a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  <div>
    <dr>
      {{ $posts->links() }}
  </div>
</div>


@endsection
