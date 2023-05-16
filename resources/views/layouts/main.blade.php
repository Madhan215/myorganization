<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah FM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
  {{-- Icon Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <li>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
           
              @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat datang Kak, {{ auth()->user()->nama }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
    

                        <li>
                            <form action="{{route('logout')}}" method="get">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                
                @endauth
                      
          </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('/') }}img/Logo FM.png" alt="Logo RumahFM" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rumah FM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas bi-layout-text-window-reverse"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('profil')}}" class="nav-link">
              <i class="nav-icon fas bi-person-fill"></i>
              <p>
                Profil Saya
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('agens')}}" class="nav-link">
              <i class="nav-icon fas bi-people-fill"></i>
              <p>
                Agen FM
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('presensi')}}" class="nav-link">
              <i class="nav-icon fas bi-clipboard2"></i>
              <p>
                Presensi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('inventaris.index')}}" class="nav-link">
              <i class="nav-icon fas bi-boxes"></i>
              <p>
                Inventaris
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('danus')}}" class="nav-link">
              <i class="nav-icon fas bi-cart3"></i>
              <p>
                FM Bajual
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('agenda.index')}}" class="nav-link">
              <i class="nav-icon fas bi-calendar-event"></i>
              <p>
                Agenda Kegiatan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi-envelope"></i>
              <p>
                Surat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suratmasuk')}}" class="nav-link">
                  <i class="far bi-box-arrow-in-down nav-icon"></i>
                  <p>Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('suratkeluar')}}" class="nav-link">
                  <i class="far bi-box-arrow-up nav-icon"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi-geo-alt"></i>
              <p>
                Rekomendasi Tempat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suratmasuk')}}" class="nav-link">
                  <i class="far bi-building nav-icon"></i>
                  <p>Tempat Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('suratkeluar')}}" class="nav-link">
                  <i class="far bi-people nav-icon"></i>
                  <p>Tempat Rapat</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}} | <small>{{$sub}}</small></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      @yield('container')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; <?= date("Y") ?> <a href="#">Rumah FM</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>
</html>
