@extends('back.layouts.master')
@section('title','Silinen Yazılar')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        <span class="float-right">{{$articles->count()}} Makale Bulundu</strong>
        <a href="{{route('admin.makaleler.index')}}" class="btn btn-primary btn-sm"></i> Makalelere Geri Dön</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Fotoğraf</th>
              <th>Yazı Başlığı</th>
              <th>Kategori</th>
              <th>Hit</th>
              <th>Oluşturulma Tarihi</th>
              <th>İşlemler  </th>
            </tr>
          </thead>
          @foreach($articles as $article)
          <tbody>
            <tr>
              <td>
                <img src="{{asset($article->image)}}" width="200px">
              </td>
              <td>{{$article->title}}</td>
              <td>{{$article->getCategory->name}}</td>
              <td>{{$article->hit}}</td>
              <td>{{$article->created_at->diffForHumans()}}</td>
              <td>
                  <a href="{{route('admin.recover.article',$article->id)}}" title="Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i> </a>
                  <a href="{{route('admin.hard.delete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
              </td>
            </tr>
          </tbody>
        @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection
