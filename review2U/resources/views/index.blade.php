@extends('layout')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p> {{ $message }} </p>
  </div>
@endif
<div class="row">
  <div class="col-md-6">
    <h1>review2U Topic</h1>
  </div>
  <div class="col-md-6 text-right">
    <a href=" {{ action('PostController@create') }}" class="btn btn-primary"> NEW TOPIC </a>
  </div>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Author</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as @post)
    <tr>
      <td> {{ ++$no }} </td>
      <td> {{ $post->name }} </td>
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

@endsection76
