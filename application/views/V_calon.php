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
                    <li><a href="<?= base_url('Home') ?>#berita">Berita</a></li>
                    <li><a href="<?= base_url('Home/calon') ?>">Calon</a></li>
                    <li><a href="<?= base_url('Home/dpt') ?>">Check DPT</a></li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section style="height: 200px;" id="hero" class="d-flex align-items-center">
    </section><!-- End Hero -->

    <main id="main">

        <section>
            <div class="container" data-aos="fade-up">
                <?php foreach ($unv as $u) :
                    $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $u['jabatan_id'], 'calon_type' => 'm'])->result_array();
                ?>
                    <h4><?= $u['jabatan_nama'] ?></h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                        </tr>
                        <?php
                        foreach ($calon as $c) :
                            $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                        ?>
                            <tr id_calon="<?= $c['calon_id'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#see" class="see">
                                <td>
                                    <?php
                                    foreach ($kandidat as $in => $k) {
                                        echo $k['kandidat_nama'];
                                        if ($in !== count($kandidat) - 1) {
                                            echo ' - ';
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <br>
                    <br>
                    <br>
                <?php endforeach; ?>
                <?php foreach ($fak as $f) :
                    $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $f['jabatan_id'], 'calon_type' => 'm'])->result_array();
                ?>
                    <h4><?= $f['jabatan_nama'] ?></h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                        </tr>
                        <?php
                        foreach ($calon as $c) :
                            $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                        ?>
                            <tr id_calon="<?= $c['calon_id'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#see" class="see">
                                <td>
                                    <?php
                                    foreach ($kandidat as $in => $k) {
                                        echo $k['kandidat_nama'];
                                        if ($in !== count($kandidat) - 1) {
                                            echo ' - ';
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <?php
                    $hmps = $this->db->get_where('tbl_jabatan_sub', ['sub_jabatan_id' => $f['jabatan_id'], 'sub_tahun' => $tahun])->result_array();
                    foreach ($hmps as $h) :
                        $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $h['sub_id'], 'calon_type' => 's'])->result_array();
                    ?>
                        <b><?= $h['sub_nama'] ?></b>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                            </tr>
                            <?php
                            foreach ($calon as $c) :
                                $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                            ?>
                                <tr id_calon="<?= $c['calon_id'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#see" class="see">
                                    <td>
                                        <?php
                                        foreach ($kandidat as $in => $k) {
                                            echo $k['kandidat_nama'];
                                            if ($in !== count($kandidat) - 1) {
                                                echo ' - ';
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endforeach; ?>
                    <br>
                    <br>
                    <br>
                <?php endforeach; ?>
            </div>
        </section><!-- End Webinar Section -->

    </main><!-- End #main -->
    <div class="modal fade" id="see" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="calon" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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
        $('.see').click(function() {
            $('#calon').html('<h3 style="text-align:center">Memuat...</h3>');
            var id = $(this).attr('id_calon');
            $.ajax({
                url: '<?= base_url('Home/get_calon') ?>',
                type: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#calon').html(data);
                }
            });
        });
    </script>

</body>

</html>