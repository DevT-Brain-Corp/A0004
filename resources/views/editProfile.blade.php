@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile {{$userData -> name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{$userData->pic}}" width="120px" height="120px" class="img-circle"/> <br>
                    <a href="{{route('editPicture.index')}}"><button type="button" name="button" class="btn btn-success">Edit Foto</button></a>  <br> <br>
                    <form class="" action="{{route('editProfile.store')}}" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                      <div class="col-md-6">
                        <div class="input-group">
                          Kota : <input type="text" class="form-control" name="city" value="{{$userData->profile->city}}"> <br>
                        </div>
                        <div class="input-group">
                          Negara : <input type="text" class="form-control" name="country" value="{{$userData->profile->country}}"> <br>
                        </div>
                        <div class="input-group">
                          Tentang : <textarea name="about" rows="8" cols="80" class="form-control" value="">{{$userData->profile->about}}</textarea>
                        </div>
                      </div>





                      <button type="submit" class="btn btn-danger" onclick="sukses()">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function sukses() {
    window.alert("Data Berhasil Disimpan");
  }
</script>
@endsection
