<!-- Basic Form Start -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Setup Sertifikat</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="basic-form-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline15-list mg-t-30">
                    <div class="sparkline15-graph">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?= $this->session->flashdata('msg'); ?>
                                    <div class="all-form-element-inner">
                                        <form action="<?= base_url('administrator/Pemilihan/update_sertif') ?>" method="post" enctype="multipart/form-data">
                                            <b>Upload Sertifikat</b>
                                            <table>
                                                <tr>
                                                    <td><input type="file" name="sertif" class="form-control"></td>
                                                    <td>&nbsp;<button type="submit" class="btn btn-primary">Upload</button></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">*masukan file dengan format jpg/jpeg</td>
                                                </tr>
                                            </table>
                                            <input type="hidden" value="<?= $t['tahun_sertif'] ?>" name="sertif">
                                            <input type="hidden" value="<?= $tahun ?>" name="tahun" id="tahun">
                                        </form>
                                        <br>
                                        <br>
                                        <br>
                                        <?php if (!empty($t['tahun_sertif'])) : ?>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div id="sertif-container">

                                                    </div>

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="touchspin-inner">
                                                        <label>Ukuran</label>
                                                        <input class="form-control setting" value="<?= $t['tahun_sertif_ukuran'] ?>" max="500" type="number" id="ukuran">
                                                    </div>
                                                    <div class="touchspin-inner">
                                                        <label>Vertikal</label>
                                                        <input class="form-control setting" value="<?= $t['tahun_sertif_vertical'] ?>" type="number" id="vertical">
                                                    </div>

                                                    <div class="touchspin-inner">
                                                        <label>Horizontal</label>
                                                        <input class="form-control setting" value="<?= $t['tahun_sertif_horizontal'] ?>" type="number" id="horizontal">
                                                    </div>
                                                    <div style="display: none;" class="touchspin-inner">
                                                        <label>Warna</label>
                                                        <input type="color" value="<?= $t['tahun_sertif_warna'] ?>" class="form-control setting" placeholder="#ff0000" id="color">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $.ajax({
        url: '<?= base_url('administrator/Pemilihan/view_sertif') ?>',
        type: 'post',
        cache: false,
        data: {
            tahun: '<?= $tahun ?>'
        },
        success: function(data) {
            $('#sertif-container').html('<img style="width: 100%;" src="' + data + '" alt="">');
        }
    });
    $('.setting').change(function() {
        // $('#sertif-container').html('<p>Memuat...</p>');
        var ukuran = $('#ukuran').val();
        var vertical = $('#vertical').val();
        var horizontal = $('#horizontal').val();
        var color = $('#color').val();
        var tahun = $('#tahun').val();
        $.ajax({
            url: '<?= base_url('administrator/Pemilihan/design'); ?>',
            type: 'post',
            cache: false,
            data: {
                ukuran: ukuran,
                vertical: vertical,
                horizontal: horizontal,
                color: color,
                tahun: tahun
            },
            success: function(data) {
                $('#sertif-container').html('<img style="width: 100%;" src="' + data + '" alt="">');
            }

        });
    });
</script>