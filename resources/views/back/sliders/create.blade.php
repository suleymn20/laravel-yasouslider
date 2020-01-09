@extends('back.layouts.master')
@section('title','Slider Ekle')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
      @if($errors->any()){
        <div class="alert alet-danger">
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </div>
        }
      @endif

    <form class="" action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Slider Başlığı</label>
        <input type="text" name="title" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Slider Sahibi</label>
        <input type="text" name="author" value="{{Auth::user()->name}}" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Slider Email</label>
        <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" required></input>
      </div>
      <div class="control-group">
        <div class="form-group controls">
          <label>Durum</label>
          <select class="form-control" name="adminstatu">
            <option @if(('adminstatu')=='Bekliyor') selected @endif>Bekliyor</option>
            <option @if(('adminstatu')=='Yönlendirildi') selected @endif>Yönlendirildi</option>
            <option @if(('adminstatu')=='Reddedildi') selected @endif>Reddedildi</option>
            <option @if(('adminstatu')=='Onaylandı') selected @endif>Onaylandı</option>
          </select>
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="form-group">
        <label>Slider Fotoğrafı</label><br>
        <img src="{{ asset('image/image-preview.png') }}" width="350px" id="image_preview_container" class="img-thumbnail rounded" alt="">
        <input type="file" id="image" name="image" class="form-control"></input>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Gönder</button>
      </div>
    </form>
    </div>
  </div>
@endsection
@section('css')

@endsection
@section('js')
  <script type="text/javascript">
      $(document).ready(function (e) {

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('#image').change(function(){

              let reader = new FileReader();
              reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
              }
              reader.readAsDataURL(this.files[0]);

          });

          $('#upload_image_form').submit(function(e) {
              e.preventDefault();

              var formData = new FormData(this);

              $.ajax({
                  type:'POST',
                  url: "{{ url('save-photo')}}",
                  data: formData,
                  cache:false,
                  contentType: false,
                  processData: false,
                  success: (data) => {
                      this.reset();
                      alert('Image has been uploaded successfully');
                  },
                  error: function(data){
                      console.log(data);
                  }
              });
          });
      });

  </script>

@endsection
