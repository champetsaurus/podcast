<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Salud Mental</title>
    @include('layouts.partials.styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('image/image.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <button type="button" name="button" onclick="location.href='{{route('admin.sesion.close')}}'" class='form-control'>Cerrar Sesión</button>

    </ul>
  </nav>
  <!-- /.navbar -->

  {{-- ////////////////////////////////////////////////////////////// --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('image/image.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Salud Mental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('image/avatar-default.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Salud Mental</li>

          <li class="nav-item">
            <a href="{{route('admin.user')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.media')}}" class="nav-link">
              <i class="nav-icon fa fa-photo-video"></i>
              <p>
                Media
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.psicologo')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Psicólogos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.extra')}}" class="nav-link">
              <i class="nav-icon fa fa-hashtag"></i>
              <p>
                Extras
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

{{-- ///////////////////////////////////////// --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Salud Mental</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Salud mental</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @yield('content')
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- //////////////////////////////////// --}}
<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="">Página pública</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.1.0 --}}
    </div>
  </footer>

  </div>

  @include('layouts.partials.scripts')
</body>
