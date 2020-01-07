@extends('back.layouts.master')
@section('title',$article->title.' Yazısını Güncelle')
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

    <form class="" action="{{route('admin.makaleler.update',$article->id)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label>Makale Başlığı</label>
        <input type="text" name="title" class="form-control" value="{{$article->title}}" required></input>
      </div>
      <div class="form-group">
        <label>Makale kategori</label>
        <select class="form-control" name="category" required>
          <option value="">Seçim Yapınız</option>
          @foreach($categories as $category)
            <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Makale Fotoğrafı</label><br>
        <img src="{{asset($article->image)}}" width="350px" class="img-thumbnail rounded" alt="">
        <input type="file" name="image" class="form-control"></input>
      </div>
      <div class="form-group">
        <label>Makale İçeriği</label>
        <textarea rows="4" id="editor" name="content" class="form-control" required>{!!$article->content!!}</textarea>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Yazıyı Güncelle</button>
      </div>
    </form>
    </div>
  </div>
@endsection
@section('css')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
@section('js')
<!-- include summernote css/js -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#editor').summernote({
  'height':300
});
});
</script>
@endsection
