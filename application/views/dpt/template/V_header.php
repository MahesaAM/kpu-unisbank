<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Untuk Chrome & Opera -->
  <meta name="theme-color" content="#da251d" />
  <!-- Untuk Safari iOS -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#da251d" />
  <!-- Untuk Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#da251d" />
  <!-- favicon
		============================================ -->
  <link href="<?= base_url('assets/home/img/LOGO KPU.png') ?>" rel="icon">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/owl.carousel.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/owl.theme.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/owl.transitions.css') ?>">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/animate.css') ?>">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/normalize.css') ?>">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/meanmenu.min.css') ?>">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/main.css') ?>">
  <!-- educate icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/educate-custon-icon.css') ?>">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/morrisjs/morris.css') ?>">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/scrollbar/jquery.mCustomScrollbar.min.css') ?>">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/metisMenu/metisMenu.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/metisMenu/metisMenu-vertical.css') ?>">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/calendar/fullcalendar.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/calendar/fullcalendar.print.min.css') ?>">
  <!-- touchspin CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/touchspin/jquery.bootstrap-touchspin.min.css') ?>">
  <!-- datapicker CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/datapicker/datepicker3.css') ?>">
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/form/themesaller-forms.css') ?>">
  <!-- colorpicker CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/colorpicker/colorpicker.css') ?>">
  <!-- select2 CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/select2/select2.min.css') ?>">
  <!-- chosen CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/chosen/bootstrap-chosen.css') ?>">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table/bootstrap-table.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table/bootstrap-editable.css') ?>">
  <!-- ionRangeSlider CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/ionRangeSlider/ion.rangeSlider.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/ionRangeSlider/ion.rangeSlider.skinFlat.css') ?>">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/responsive.css') ?>">
  <!-- modernizr JS
		============================================ -->
  <script src="<?= base_url('assets/admin/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/js/vendor/jquery-1.12.4.min.js') ?> "></script>
</head>

<body>
  <!-- Start Left menu area -->
  <div class="left-sidebar-pro">
    <nav id="sidebar" class="">
      <div class="sidebar-header">
        <a href="<?= base_url('dpt/Pemilihan') ?>"><img width="200" class="main-logo" src="<?= base_url('assets/admin/img/logo/logo.png') ?>" alt="" /></a>
        <strong><a href="index.html"><img width="200" src="<?= base_url('assets/admin/img/logo/logosn.png') ?>" alt="" /></a></strong>
      </div>
      <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
          <ul class="metismenu" id="menu1">
            <li>
              <a title="Landing Page" href="<?= base_url('dpt/Pemilihan') ?>" aria-expanded="false"><span class="fa fa-list" aria-hidden="true"></span> <span class="mini-click-non">Pemilihan</span></a>
            </li>
            <li>
              <a title="Landing Page" href="<?= base_url('Auth/logout') ?>" aria-expanded="false"><span class="fa fa-sign-out" aria-hidden="true"></span> <span class="mini-click-non">Logout</span></a>
            </li>
          </ul>
        </nav>
      </div>
    </nav>
  </div>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro">
            <a href="<?= base_url('dpt/Pemilihan') ?>"><img width="200" class="main-logo" src="<?= base_url('assets/admin/img/logo/logo.png') ?>" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                <div class="row">
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                      <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="fa fa-bars"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                    <div class="header-top-menu tabl-d-n">
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="header-right-info">
                      <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <li class="nav-item">
                          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                            <span class="admin-name"><?= $_SESSION['dpt_nama'] ?></span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobile Menu start -->
      <div class="mobile-menu-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="mobile-menu">
                <nav id="dropdown">
                  <ul class="mobile-menu-nav">
                    <li><a href="<?= base_url('dpt/Pemilihan') ?>">Pemilihan</a></li>
                    <li><a href="<?= base_url('Auth/logout') ?>">Logout</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobile Menu end -->