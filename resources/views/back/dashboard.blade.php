@extends('back.layouts.master')
@section('title','Panel')
@section('content')
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Onaylanan Sliderlar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$onaylanan}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tüm Sliderlar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{$sliders->count()}}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Yayinlanan Sliderlar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$yayinda}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Bekleyen Sliderlar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bekliyor}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sürüm Notları</h6>
                </div>
                <div class="card-body">
                  <p class="text-center font-weight-bold">v1.4.0</p>
                  <ul>
                    <li>Ayarlar Kısmı Eklendi </li>
                    <li>Güvenlik için yöneticiler kımı kısıtlandı.</li>
                    <li>Homepage düzenlendi </li>
                    <li>Küçük iyileştirmeler yapıldı </li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.5.1|(a)|(b)</p>
                  <ul>
                    <li>Menü hataları düzeltildi. </li>
                    <li>Homepage Reflesh olayı yapıldı.</li>
                    <li>Mesaj kutusu kaldırıldı </li>
                    <li>Küçük iyileştirmeler yapıldı </li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.5</p>
                  <ul>
                    <li>Yönetici avatar yükleme yapıldı</li>
                    <li>adminstatu interger yapıldı.</li>
                  </ul>
                  <div id="text">
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.4</p>
                  <ul>
                    <li>Yönetici ekleme çıkar işlemi yapıldı</li>
                    <li>Küçük iyileştirmeler yapıldı.</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.3</p>
                  <ul>
                    <li>Slider listeme, silme ve düzenmele işlemleri yapıldı.</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.2</p>
                  <ul>
                    <li>Güvenlik işlemleri yapıldı.</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.1</p>
                  <ul>
                    <li>Yönetici giriş çıkış işlemleri yapıldı.</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.3.0</p>
                  <ul>
                    <li>Yönetici panelinin temelleri atıldı</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.2.1</p>
                  <ul>
                    <li>Toastr paketi yüklendi.</li>
                    <li>Türkçeleştirme yapıldı</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.2.0</p>
                  <ul>
                    <li>Slider ekleme işlemleri yapıldı</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.1</p>
                  <ul>
                    <li>Front kısmı bitti Faker yardımıyla test edildi.</li>
                  </ul>
                  <hr>
                  <p class="text-center font-weight-bold">v1.0</p>
                  <ul>
                    <li>(Front için zemin hazırlandı.)</li>
                  </ul>
                </div>
                  <button class="btn btn-success btn-sm btn-block" id="toggle">Read More</button>
                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Yapanlar ve Destekçiler</h6>
                </div>
                <div class="card-body">
                  <p><b>Yapan ve Yöneten: </b>Süleyman Ünlü</p>
                  <hr>
                  <p><b>Sunucu ve SSL İşlemleri: </b>Yana Gavrilina</p>
                  <hr>
                  <p><b>Tasarım İşlemleri: </b>Yana Gavrilina</p>
                  <hr>
                  <p><b>Tester: </b>Mert Öztürk</p>
                  <hr>
                  <p><b>Uzaktan Erişim Köprüsünü Yapan: </b>Merve Yıldırım</p>
                  <hr>
                  <p><b>En Büyük Destekçi: </b>Mustafa Yurtseven ve Yaşar Aybek</p>
                </div>
              </div>

            </div>

          </div>

        </div>

@endsection
