@extends('back.layouts.master')
@section('title',Auth::user()->name.' Yöneticisi')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul><br>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

    <form class="" action="{{route('admin.yoneticiler.update',{{Auth::user()->id}})}}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label>Yönetici İsmi</label>
        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required></input>
      </div>
      <div class="form-group">
        <label>Yönetici E-Postası</label>
        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" required></input>
      </div>
      <div class="form-group">
        <label>Admin Fotoğrafı</label><br>
        <img src="@if(Auth::user()->image==null) {{ asset('image/image-preview.png') }} @else {{Auth::user()->image}} @endif" width="350px" id="image_preview_container" class="img-thumbnail rounded" alt="">
        <input type="file" id="image" name="image" class="form-control"></input>
      </div>
      <div class="form-group">
        <label>Yönetici Şifre</label>
        <input type="password" name="password" class="form-control" value=""></input>
      </div>
      <div class="form-group">
        <label>Yönetici Şifre Onayla</label>
        <input type="password" name="password_confirmation" class="form-control" value=""></input>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
      </div>
    </form>
    </div>
  </div>
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
