@extends('back.layouts.master')
@section('title','Yöneticiler')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        <span class="float-right">{{$admins->count()}} Yönetici Bulundu</strong>
        <a href="{{route('admin.admin.trashed')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i> Silinen Yöneticiler</a>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <thead>

            <tr>
              <th scope="col">id</th>
              <th scope="col">Ad Soyad</th>
              <th scope="col">E-Posta</th>
              <th scope="col">Oluşturma Tarihi</th>
              <th scope="col">Güncelleme Tarihi</th>
              <th scope="col">İşlemler</th>

            </tr>
          </thead>

          <tbody>
            @foreach($admins as $admin)
            <tr>
              <th scope="row">{{$admin->id}}</th>
              <td>{{$admin->name}}</td>
              <td>{{$admin->email}}</td>
              <td>{{$admin->created_at->diffForHumans()}}</td>
              <td>{{$admin->updated_at->diffForHumans()}}</td>
              <td>
                  <a href="{{route('admin.delete.admin',$admin->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
                  <a href="{{route('admin.yoneticiler.edit',$admin->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> </a>
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
$(document).ready(function(){
 $("#myInput").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTable tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
</script>


<script src="{{asset('back/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('back/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection
