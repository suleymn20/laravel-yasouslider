@extends('back.layouts.master')
@section('title',$slider->title.' sliderı güncelle')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </div>

      @endif

    <form class="" action="{{route('admin.sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label>Slider Başlığı</label>
        <input type="text" name="title" class="form-control" value="{{$slider->title}}" required></input>
      </div>
      <div class="form-group">
        <label>Slider Sahibi</label>
        <input type="text" name="author" class="form-control" value="{{$slider->author}}" required></input>
      </div>
      <div class="form-group">
        <label>Slider Sahibi E-Postası</label>
        <input type="text" name="email" class="form-control" value="{{$slider->email}}" required></input>
      </div>
      <div class="control-group">
        <div class="form-group controls">
          <label>Durum</label>
          <select class="form-control
          @if($slider->adminstatu=='Reddedildi') bg-danger text-white
          @elseif($slider->adminstatu=='Bekliyor') bg-warning text-white
          @elseif($slider->adminstatu=='Onaylandı') bg-success text-white
          @elseif($slider->adminstatu=='Yönlendirildi') bg-primary text-white @endif" name="adminstatu">
            <option @if($slider->adminstatu=='Bekliyor') selected @endif>Bekliyor</option>
            <option @if($slider->adminstatu=='Yönlendirildi') selected @endif>Yönlendirildi</option>
            <option @if($slider->adminstatu=='Reddedildi') selected @endif>Reddedildi</option>
            <option @if($slider->adminstatu=='Onaylandı') selected @endif>Onaylandı</option>
          </select>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="form-group">
        <label>Yayın Durumu</label></br>
        <input type="checkbox" slider-id="{{$slider->id}}" class="switch form-control" data-on="Yayında" data-onstyle="success" data-off="Yayınlanmadı" data-offstyle="danger" @if($slider->status==1) checked @endif data-toggle="toggle"></input>
      </div>

      <div class="form-group">
        <label>Slider Fotoğrafı</label><br>
        <img src="{{asset($slider->image)}}" width="350px" id="image_preview_container" class="img-thumbnail rounded" alt="">
        <input type="file" id="image" name="image" class="form-control"></input>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Sliderı Güncelle</button>
      </div>
    </form>
    </div>
  </div>
@endsection
@section('css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')

  <script>

  $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('slider-id');
      statu=$(this).prop('checked');
      $.get("{{route('admin.switch')}}", {id:id,statu:statu}, function(data, status){});
    })
  })
</script>

<!-- Page level custom scripts -->
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
