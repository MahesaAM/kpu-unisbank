<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Sertif</title>
    <style>
        @media print {
            @page {
                margin: 0;
                size: A5, landscape;
            }
        }

        .image-container {
            width: 100%;
            position: relative;
        }

        .nama_dpt {
            position: absolute;
            text-align: center;
            width: 100%;
            font-size: <?= $t['tahun_sertif_ukuran'] . 'px' ?>;
            color: <?= $t['tahun_sertif_warna'] ?>;
            top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
            left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
        }

        @media only screen and (max-width: 1920px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] + 15 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 1466px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] + 5 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 1218px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] + 1 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 1085px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] - 5 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 991px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] + 10 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 780px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] + 5 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 666px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] - 3 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 528px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] - 5 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 421px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] - 10 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 326px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] - 15 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }

        @media only screen and (max-width: 248px) {
            .nama_dpt {
                font-size: <?= $t['tahun_sertif_ukuran'] - 18 . 'px' ?>;
                color: <?= $t['tahun_sertif_warna'] ?>;
                top: <?= $t['tahun_sertif_vertical'] . '%' ?>;
                left: <?= $t['tahun_sertif_horizontal'] . '%' ?>;
            }
        }
    </style>
</head>

<body>
    <div class="image-container">
        <div class="image-inner-container">
            <b id="nama_dpt" class="nama_dpt">Nama Pemilih</b>
            <img src="<?= base_url('sertif/' . $t['tahun_sertif']) ?>" alt="">
            <div class="clear"></div>
        </div>
    </div>
</body>

</html>
<script>
    window.print();
</script>