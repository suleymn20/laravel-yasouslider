@extends('back.layouts.master')
@section('title','Sliders')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        <span class="float-right">{{$sliders->count()}} Slider Bulundu</strong>
        <a href="{{route('admin.trashed.slider')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i> Silinen Sliders</a>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Slider Başlığı</th>
              <th>Ad Soyad</th>
              <th>Resmi</th>
              <th>Gönderme Tarihi</th>
              <th>Güncelleme Tarihi</th>
              <th>IP Adresi</th>
              <th>Durum</th>
              <th>Durum</th>
              <th>İşlemler</th>
            </tr>
          </thead>

          <tbody>
            @foreach($sliders as $slider)
            <tr>
              <td>{{$slider->title}}</td>
              <td>{{$slider->author}}</td>
              <td><img src="{{asset($slider->image)}}" width="120px"></td>
              <td>{{$slider->created_at->format('d/m/Y H:i')}}</td>
              <td>{{$slider->updated_at->format('d/m/Y H:i')}}</td>
              <td>{{$slider->ipadres}}</td>
              <td>
                <input type="checkbox" slider-id="{{$slider->id}}" class="switch" data-on="Yayınlandı" data-onstyle="success" data-off="Yayınlanmadı" data-offstyle="danger" @if($slider->status==1) checked @endif data-toggle="toggle">
              </td>
              <td>
              @if($slider->adminstatu==0)Bekliyor
              @elseif($slider->adminstatu==1)Yönlendirildi
              @elseif($slider->adminstatu==2)Reddedildi
              @else Onaylı@endif
              </td>
              <td>
                  <a href="{{route('admin.sliders.edit',$slider->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> </a>
                <a href="{{route('admin.delete.slider',$slider->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
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

  <script>

  $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('slider-id');
      statu=$(this).prop('checked');
      $.get("{{route('admin.switch')}}", {id:id,statu:statu}, function(data, status){});
    })
  })
</script>

<script src="{{asset('back/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('back/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection
