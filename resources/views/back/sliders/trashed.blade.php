@extends('back.layouts.master')
@section('title','Mesajlar')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        <span class="float-right">{{$slidersl->count()}} Slider Bulundu</strong>
        <a href="{{route('admin.trashed.slider')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i> Silinen Sliders</a>
      </h6>
    </div>
    <div class="card-body bg-light">


      <div class="table-responsive">
        <table class="table table-hover table-light rounded dtBasicExample shadow" width="100%" cellspacing="0">
          <input class="form-control bg-light  border border-primary shadow" id="myInput" type="text" placeholder="Arama Yap.."><br>

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
          @foreach($slidersl as $slider)
          <tbody id="myTable">
            <tr>
              <td> @if($slider->title==null)Belirtilmedi @else {{$slider->title}}@endif</td>
              <td>@if($slider->author==null)Belirtilmedi @else {{$slider->author}}@endif</td>
              <td>@if($slider->email==null)Belirtilmedi @else {{$slider->email}}@endif</td>
              <td><img src="{{asset($slider->image)}}" width="150px"></td>
              <td>{{$slider->created_at->format('j/m/Y H:i:s')}}</td>
              <td>{{$slider->ipadres}}</td>
              <td>
                  <a href="{{route('admin.recover.slider',$slider->id)}}" title="Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i> </a>
                  <a href="{{route('admin.hard.delete.slider',$slider->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
              </td>
            </tr>
            <tr>
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
