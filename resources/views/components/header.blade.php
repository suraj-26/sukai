<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sukaii</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.css"/>

  <!-- CSS Libraries -->
<!--   <link rel="stylesheet" href="{{ URL::asset('css/jqvmap.min.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
    
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
            <div class="d-sm-none d-lg-inline-block">ADMIN</div></a>
            <div class="dropdown-menu dropdown-menu-right">
             <!--  <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="{{URL::to('logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="Dashboard">SUKAI</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="Dashboard">sukai</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-link active">
                <a href="Dashboard" class="nav-item"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

              <li class="nav-link"><a class="nav-item" href="orders_list"><i class="fas fa-file-prescription"></i> <span>Order Details</span></a></li>

              <li class="nav-link">
                <a href="patient_list" class="nav-item"><i class="fas fa-user-injured"></i> <span>Patients</span></a>
              </li>
              <li class="nav-link"><a class="nav-item" href="services"><i class="fas fa-clinic-medical"></i> <span>Services</span></a></li>
            </ul>
        </aside>
      </div>



      <!-- Main Content -->
      <div class="main-content">
        <section class="section">