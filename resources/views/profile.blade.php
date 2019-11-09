@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile {{$data -> name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$data -> name}}
                    {{$data -> email}}
                    {{$data -> city}}
                    {{$data -> country}}
                    {{$data -> about}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
