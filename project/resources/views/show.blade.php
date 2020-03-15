
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
<div class="col-md-3"></div>
<div class="col-md-4">
    <div class="card" style="width: 800px">
        @foreach($posts as $post)
            <img class="card-img-top" src="http://via.placeholder.com/800x400?text={{$post->author}}"/>
            <div class="card-body">
                <div class="card-title"><h1> {{ $post->name }} </h1></div>
                <p class="card-text"><h4> {{ $post->detail }} </h4></p>

                <br>

                <a href="{{action('PostController@index')}}" class="btn btn-primary"> Back </a>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="comment-form" method="post" action="{{ route('comments.store') }}" >
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" style="width: 100%" name="submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body comment-container" >

                    @foreach($comments as $comment)
                        <div class="well">
                            <i><b> {{ $comment->name }} </b></i>&nbsp;&nbsp;
                            <span> {{ $comment->comment }} </span>
                            <div style="margin-left:10px;">
                                <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" class="reply">Reply</a>&nbsp;
                                <a style="cursor: pointer;"  class="delete-comment" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" >Delete</a>
                                <div class="reply-form">

                                    <!-- Dynamic Reply form -->

                                </div>
                                @foreach($comment->replies as $rep)
                                     @if($comment->id === $rep->comment_id)
                                        <div class="well">
                                            <i><b> {{ $rep->name }} </b></i>&nbsp;&nbsp;
                                            <span> {{ $rep->reply }} </span>
                                            <div style="margin-left:10px;">
                                                <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>&nbsp;<a did="{{ $rep->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                            </div>
                                            <div class="reply-to-reply-form">

                                                <!-- Dynamic Reply form -->

                                            </div>

                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>



</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}">

</script>
