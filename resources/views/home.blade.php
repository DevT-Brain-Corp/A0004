@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<h1>Buat Postingan</h1>
<hr>
                      <img src="{{Auth::user()->pic}}" width="120px" height="120px" class="img-circle rounded-circle"/>


                        <form class="" action="{{route('home.store')}}" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <textarea name="content" rows="8" cols="50"></textarea>
                        <button type="submit" class="btn btn-success">Post</button>
                        </form>



<h2 style="margin-top:100px;">Postingan Teman</h2>
<hr>

                    @foreach($posts as $post)
                    <div class="col-md-12">
                      <img src="{{$post->user->pic}}" width="120px" height="120px" class="img-circle rounded-circle"/> <br>
                      <a href="{{ route('profile.show', $post->user->slug)}}"><h1>{{$post->user->name}}</h1></a>
                      <h2>{{$post->content}}</h2>
                      <hr>
                      <h4>Comment Bang</h4>
                      <hr>
                      @foreach($post->comments as $comment)
                        <h1>{{$comment->user->name}}</h1>
                        <h2>{{$comment->comment}}</h2>
                      @endforeach
                      <img src="{{Auth::user()->pic}}" width="40px" height="40px" class="img-circle rounded-circle"/>
                      <form class="" action="{{route('home.update', $post)}}" method="post">
                        @method('put')
                        @csrf
                        <textarea name="comment" rows="1" cols="60"></textarea>
                        <button type="submit" class="btn btn-success">Comment</button>

                      </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
