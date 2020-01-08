@extends('back.layouts.master')
@section('title',$admin->name.' Yöneticisini Güncelle')
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

    <form class="" action="{{route('admin.yoneticiler.update',$admin->id)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label>Yönetici İsmi</label>
        <input type="text" name="name" class="form-control" value="{{$admin->name}}" required></input>
      </div>
      <div class="form-group">
        <label>Yönetici E-Postası</label>
        <input type="text" name="email" class="form-control" value="{{$admin->email}}" required></input>
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
          <button type="submit" class="btn btn-primary btn-block">Yöneticiyi Güncelle</button>
      </div>
    </form>
    </div>
  </div>
@endsection
