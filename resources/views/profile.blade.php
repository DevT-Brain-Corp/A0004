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
                    <h1>Niatnya disini ada foto</h1>
                    Nama : {{$userData -> name}} <br>
                    Email : {{$userData -> email}} <br>
                    Kota : {{$userData->profiles->city}} <br>
                    Negara : {{$userData->profiles->country}} <br>
                    Tentang : {{$userData->profiles->about}}<br>
                    <a href="{{url('/editProfile')}}"><button type="button" name="button" class="btn btn-danger">Edit Profile</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
