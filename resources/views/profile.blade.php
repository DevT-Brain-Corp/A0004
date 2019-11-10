@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile {{$userData -> name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{$userData->pic}}" width="120px" height="120px" class="img-circle"/> <br>
                    Nama : {{$userData -> name}} <br>
                    Email : {{$userData -> email}} <br>
                    Kota : {{$userData->profile->city}} <br>
                    Negara : {{$userData->profile->country}} <br>
                    Tentang : {{$userData->profile->about}}<br>
                    @if ($userData -> id == Auth::user()-> id)
                    <a href="{{route('editProfile.index')}}"><button type="button" name="button" class="btn btn-danger">Edit Profile</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
