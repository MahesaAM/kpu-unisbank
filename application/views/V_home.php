<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KPU UNISBANK</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/home/img/LOGO KPU.png') ?>" rel="icon">
  <link href="assets/home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() . 'assets/home/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url() . 'assets/home/vendor/icofont/icofont.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url() . 'assets/home/vendor/boxicons/css/boxicons.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url() . 'assets/home/vendor/owl.carousel/assets/home/owl.carousel.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url() . 'assets/home/vendor/venobox/venobox.css' ?>" rel="stylesheet">
  <link href="<?= base_url() . 'assets/home/vendor/aos/aos.css' ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() . 'assets/home/css/style.css' ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v1.0.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <div class="logo mr-auto"><a href="<?= base_url('Home') ?>"><img src="<?= base_url('assets/home/img/LOGO KPU.png') ?>" alt=""> KPU UNISBANK</a></div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/home/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="<?= base_url('Home') ?>">Home</a></li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="<?= base_url('Home/calon') ?>">Calon</a></li>
          <li><a href="<?= base_url('Home/dpt') ?>">Check DPT</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Komisi Pemilihan Umum <span>UNISBANK</span>
      </h1>
      <h2>Selamat datang! Silakan klik tombol masuk untuk mem-<i>voting</i></h2>
      <div class="d-flex">
        <a href="<?= base_url('Auth') ?>" class="btn-get-started">Masuk</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <section id="berita" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div id="daftar_berita" class="row">

        </div>

      </div>
    </section><!-- End Webinar Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>KPU<span>.</span></h3>
            <p>
              <strong>Instagram:</strong> kpu.unisbank<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>KPU.</span></strong> All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://api.whatsapp.com/send?phone=62895360698523&text=HALO"><span>MAHESA A.M</span></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() . 'assets/home/vendor/jquery/jquery.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/jquery.easing/jquery.easing.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/php-email-form/validate.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/waypoints/jquery.waypoints.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/counterup/counterup.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/owl.carousel/owl.carousel.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/isotope-layout/isotope.pkgd.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/venobox/venobox.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/home/vendor/aos/aos.js' ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() . 'assets/home/js/main.js' ?>"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: '<?= base_url('Home/all_berita') ?>',
        type: 'post',
        success: function(data) {
          $('#daftar_berita').html(data);
        }
      });
    });
  </script>

</body>

</html>