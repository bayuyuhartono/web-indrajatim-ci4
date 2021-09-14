
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title;?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/app.min.css');?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/bundles/select2/dist/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/bundles/jquery-selectric/selectric.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/components.css');?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />
  
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/custom.css');?>">
  <!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<!-- Styles -->
	<style type="text/css">
		#success{background: green;}
		#error{background: red;}
		#warning{background: coral;}
		#info{background: cornflowerblue;}
		#question{background: grey;}
	</style>
</head>

<body class="light dark-sidebar theme-white">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
              <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> 
                <i data-feather="align-justify"></i>
              </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              <img alt="image" src="<?= base_url('assets/admin/img/users.png');?>" class="user-img-radious-style"> 
              <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"><?= ucfirst(session('name'));?></div>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('admin/logout');?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('admin/dashboard');?>"> 
              <img alt="image" src="<?= base_url('assets/admin/img/logo.png');?>" class="header-logo" /> 
              <span class="logo-name">INDRA JATIM</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="<?= base_url('admin/dashboard');?>" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="layout"></i><span>Berita / Kategori</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('admin/kategori');?>">Kategori</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/berita');?>">Berita</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/tag');?>">Tag</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="mail"></i><span>Pesan / Komentar</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('admin/pesan');?>">Pesan Dari Kontak</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/komentar');?>">Komentar Berita</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="layout"></i><span>Frond End</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('admin/contact');?>">Contact</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/socmed');?>">Socmed</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/slide');?>">Slide</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/banner');?>">Banner</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/struktur_redaksi');?>">Struktur Redaksi</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/tentang_kami');?>">Tentang Kami</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/privacy_policy');?>">Privacy Policy</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?= base_url('admin/users');?>" class="nav-link"><i data-feather="user"></i><span>Users</span></a>
            </li>
          </ul>
        </aside>
      </div>