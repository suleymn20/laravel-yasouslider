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
            <input type="text" name="title" required class="form-control" value="{{$config->title}}">
          </div>
          <div class="col-md-6">
            <label>Site Aktiflik Durumu</label>
            <select class="form-control" name="active">
              <option @if($config->active==1) selected @endif value="1">Açık</option>
              <option @if($config->active==0) selected @endif value="0">Kapalı</option>
            </select>
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
        </div>
        <div class="row">
          <div class="col-md-6">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control" value="{{$config->facebook}}">
          </div>
          <div class="col-md-6">
            <label>Twitter</label>
              <input type="text" name="twitter" class="form-control" value="{{$config->twitter}}">
          </div>
          <div class="col-md-6">
            <label>Github</label>
            <input type="text" name="github" class="form-control" value="{{$config->github}}">
          </div>
          <div class="col-md-6">
            <label>Youtube</label>
              <input type="text" name="youtube" class="form-control" value="{{$config->youtube}}">
          </div>
          <div class="col-md-6">
            <label>Linkedin</label>
            <input type="text" name="linkedin" class="form-control" value="{{$config->linkedin}}">
          </div>
          <div class="col-md-6">
            <label>Instagram</label>
              <input type="text" name="instagram" class="form-control" value="{{$config->instagram}}">
          </div>
        </div><br>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-md btn-success">Güncelle</button>
        </div>
      </form>
    </div>
  </div>
@endsection
