

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SNU Admin <sup>RU</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if(Request::segment(2)=='panel')active @endif">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Slider Yönetimi
      </div>

      <!-- Makale Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2)=='sliders')in @else collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-image"></i>
          <span>Sliders</span>
        </a>
        <div id="collapseTwo" class="collapse @if(Request::segment(2)=='sliders')show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Slider İşlemleri:</h6>
            <a class="collapse-item @if(Request::segment(2)=='sliders' and !Request::segment(3)) active @endif" href="{{route('admin.sliders.index')}}">Tüm Sliderlar</a>
            <a class="collapse-item @if(Request::segment(2)=='sliders' and Request::segment(3)=="olustur") active @endif" href="{{route('admin.sliders.create')}}">Slider Oluştur</a>
          </div>
        </div>
      </li>
      @if(Auth::user()->id==1)
      <!-- Sayfa İşleri-->
      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2)=='yoneticiler')in @else collapsed @endif " href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
          <i class="fas fa-fw fa-user"></i>
          <span>Yöneticiler</span>
        </a>
        <div id="collapsePage" class="collapse @if(Request::segment(2)=='yoneticiler')show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Yönetici İşlemleri:</h6>
            <a class="collapse-item @if(Request::segment(2)=='yoneticiler' and !Request::segment(3)) active @endif" href="{{route('admin.yoneticiler.index')}}">Tüm Yöneticiler</a>
            <a class="collapse-item @if(Request::segment(2)=='yoneticiler' and Request::segment(3)=="olustur") active @endif" href="{{route('admin.yoneticiler.create')}}">Yönetici Oluştur</a>
          </div>
        </div>
      </li>
@endif
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Site Ayarları
      </div>
      <li class="nav-item @if(Request::segment(2)=='ayarlar')active @endif">
        <a class="nav-link" href="{{route('admin.config.index')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Ayarlar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


            <!-- Nav Item - Alerts -->



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="@if(Auth::user()->image==null) {{asset('image/')}}/hacker.svg @else {{asset(Auth::user()->image)}} @endif">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('admin.yoneticiler.edit',Auth::user()->id)}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profilimi Güncelle
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış Yap
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
            <a href="{{route('homepage')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-globe fa-sm text-white-50"></i> Siteyi Görüntüle</a>
          </div>
