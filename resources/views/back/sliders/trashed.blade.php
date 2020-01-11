@extends('back.layouts.master')
@section('title','Mesajlar')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        <span class="float-right">{{$slidersl->count()}} Silinen Slider Bulundu</strong>
        <a href="{{route('admin.sliders.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Sliderlara Geri Dön</a>
      </h6>
    </div>
    <div class="card-body bg-light">


      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <thead>

            <tr>
              <th scope="col">Slider Başlığı</th>
              <th scope="col">Ad Soyad</th>
              <th scope="col">E-Posta</th>
              <th scope="col">Resmi</th>
              <th scope="col">Silinme Tarihi</th>
              <th scope="col">Ip Adresi</th>
              <th scope="col">İşlemler</th>

            </tr>
          </thead>

          <tbody>
            @foreach($slidersl as $slider)
            <tr>
              <td>{{$slider->title}}</td>
              <td>{{$slider->author}}</td>
              <td>{{$slider->email}}</td>
              <td><img src="{{asset($slider->image)}}" width="150px"></td>
              <td>{{$slider->deleted_at->format('d/m/Y H:m')}}</td>
              <td>{{$slider->ipadres}}</td>
              <td>
                  <a href="{{route('admin.recover.slider',$slider->id)}}" title="Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i> </a>
                  <a href="{{route('admin.hard.delete.slider',$slider->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@section('css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('js')



<!-- Page level custom scripts -->
<script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection
