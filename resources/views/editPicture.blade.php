@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Beranda</a></li>
    <li class="breadcrumb-item"><a href="{{route('profile.show', Auth::user()->slug)}}">{{$userData->name}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('editProfile.index')}}">Edit Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Picture</li>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Picture</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{$userData->pic}}" width="120px" height="120px" class="img-circle"/> <br>
                    <form action="{{route('editPicture.store')}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="file" name="pic" class="form-control">
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <form class="" action="{{route('editPicture.store')}}" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
