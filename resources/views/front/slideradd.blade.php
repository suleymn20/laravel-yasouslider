@extends('front.layouts.master')
@section('title','YasouSlider')

@section('content')
  <div class="container">
<form class="" action="{{route('slider.post')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h1>Slider Gönder</h1>
      @if($errors->any())
        <div class="alert alert-danger">
          <ul><br>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
      <div class="form-group">
        <label>Slider Adı</label>
        <input  value="{{old('title')}}" type="text" name="title" class="form-control" required></input>
      </div>
    </div>
      <div class="col-md-12">
      <div class="form-group">
        <label>Gönderen Kişi Adı</label>
        <input  value="{{old('author')}}" type="text" name="author" class="form-control" required></input>
      </div>
            </div>
      <div class="col-md-12">
      <div class="form-group">
        <label>Email</label>
        <input  value="{{old('email')}}" type="email" name="email" class="form-control" required></input>
      </div>
            </div>
          <div class="col-md-6">
            <div class="col-md-12 mb-2">
                    <img  id="image_preview_container" src="{{ asset('image/image-preview.png') }}"
                        alt="preview image" style="max-height: 200px;">
                </div>
      <div class="form-group">
        <label>Fotoğrafı</label>
        <input   type="file" name="image" class="form-control" id="image" required></input>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Gönder</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>

@endsection
