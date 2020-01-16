@extends('back.layouts.master')
@section('title','Ayarlar')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
      <form class="form-group" action="{{route('admin.config.update')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <label>Site Adı</label>
            <input type="text" name="sitename" required class="form-control" value="{{$config->sitename}}">
          </div>
          <div class="col-md-6">
            <label>Site Aktiflik Durumu</label>
            <select class="form-control" name="active">
              <option @if($config->active==1) selected @endif value="1">Açık</option>
              <option @if($config->active==0) selected @endif value="0">Kapalı</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Copyright Aktiflik Durumu</label>
            <select class="form-control" name="copyright">
              <option @if($config->copyright==1) selected @endif value="1">Gözüksün</option>
              <option @if($config->copyright==0) selected @endif value="0">Gözükmesin</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Author Aktiflik Durumu</label>
            <select class="form-control" name="author">
              <option @if($config->author==1) selected @endif value="1">Gözüksün</option>
              <option @if($config->author==0) selected @endif value="0">Gözükmesin</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Slider Başlığı Aktiflik Durumu</label>
            <select class="form-control" name="title">
              <option @if($config->title==1) selected @endif value="1">Gözüksün</option>
              <option @if($config->title==0) selected @endif value="0">Gözükmesin</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Slider Sıralama Kaç Olsun</label>
            <input type="number" name="ordercount" class="form-control" value="{{$config->ordercount}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label>Site Logo</label>
            <input type="file" class="form-control" name="logo"/>
          </div>
          <div class="col-md-6">
            <label>Site Favicon</label>
            <input type="file" class="form-control" name="favicon"/>
          </div>
        </div><br>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-md btn-success">Güncelle</button>
        </div>
      </form>
    </div>
  </div>
@endsection
