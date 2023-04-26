<!-- $tahun_sertif -->
<input type="hidden" value="<?= $tahun ?>" id="tahun">
<div class="breadcome-area">
    <div class="container-fluid">
        <div id="sertif">
            <?php if ($sertif == 4) : ?>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <h3>Download sertifikat</h3>
                                        <a download="<?= base_url('all_sertif/' . $tahun . '-' . $_SESSION['dpt_nim'].'.jpg') ?>" href="<?= base_url('all_sertif/' . $tahun . '-' . $_SESSION['dpt_nim'].'.jpg') ?>" title="Cetak Sertif">
                                            <button class="btn btn-primary">Download</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Daftar Calon</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <?php foreach ($unv as $u) : ?>
            <br>
            <h3 style="text-align: center;"><?= $u['jabatan_nama'] ?></h3>
            <div class="row">
                <?php
                $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $u['jabatan_id'], 'calon_type' => 'm'])->result_array();
                foreach ($calon as $c) :
                    $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                ?>
                    <div id_calon="<?= $c['calon_id'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#vot" class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30 vote col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <?php
                        $cv = $this->db->get_where('tbl_voted', ['voted_jabatan_id' => $c['calon_jabatan_id'], 'voted_dpt_nim' => $_SESSION['dpt_nim'], 'voted_type' => 'm', 'voted_tahun' => $tahun])->row_array();
                        if (!empty($cv) && $cv['voted_calon_id'] == $c['calon_id']) {
                            echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" style="background-color: greenyellow;" class="panel-body custom-panel-jw">';
                        } else if (!empty($cv)) {
                            echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" style="background-color: #FFC0CB;" class="panel-body custom-panel-jw">';
                        } else {
                            echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" class="panel-body custom-panel-jw">';
                        }
                        ?>
                        <div class="social-media-in">
                        </div>
                        <img alt="logo" class="m-b" src="<?= base_url('poster/' . $c['calon_poster']) ?>">
                        <?php
                        ?>
                        <h3 style="text-align: center;">
                            <?php
                            foreach ($kandidat as $in => $k) {
                                echo $k['kandidat_nama'];
                                if ($in !== count($kandidat) - 1) {
                                    echo ' - ';
                                }
                            }
                            ?>
                        </h3>
                        <br>
                    </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endforeach ?>
<?php foreach ($fak as $f) : ?>
    <br>
    <h3 style="text-align: center;"><?= $f['jabatan_nama'] ?></h3>
    <div class="row">
        <?php
        $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $f['jabatan_id'], 'calon_type' => 'm'])->result_array();
        foreach ($calon as $c) :
        ?>
            <div id_calon="<?= $c['calon_id'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#vot" class="col-lg-3 col-md-6 col-sm-6 col-xs-12 hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30 vote">
                <?php
                $cv = $this->db->get_where('tbl_voted', ['voted_jabatan_id' => $c['calon_jabatan_id'], 'voted_dpt_nim' => $_SESSION['dpt_nim'], 'voted_type' => 'm', 'voted_tahun' => $tahun])->row_array();
                if (!empty($cv) && $cv['voted_calon_id'] == $c['calon_id']) {
                    echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" style="background-color: greenyellow;" class="panel-body custom-panel-jw">';
                } else if (!empty($cv)) {
                    echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" style="background-color: #FFC0CB;" class="panel-body custom-panel-jw">';
                } else {
                    echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" class="panel-body custom-panel-jw">';
                }
                ?>
                <div class="social-media-in">
                </div>
                <img alt="logo" class="m-b" src="<?= base_url('poster/' . $c['calon_poster']) ?>">
                <?php
                $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                ?>
                <h3 style="text-align: center;">
                    <?php
                    foreach ($kandidat as $in => $k) {
                        echo $k['kandidat_nama'];
                        if ($in !== count($kandidat) - 1) {
                            echo ' - ';
                        }
                    }
                    ?>
                </h3>
                <br>
            </div>
    </div>
<?php endforeach ?>
</div>
<?php endforeach ?>
<?php foreach ($hmps as $h) : ?>
    <br>
    <h3 style="text-align: center;"><?= $h['sub_nama'] ?></h3>
    <div class="row">
        <?php
        $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $h['sub_id'], 'calon_type' => 's'])->result_array();
        foreach ($calon as $c) :
        ?>
            <div id_calon="<?= $c['calon_id'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#vot" class="col-lg-3 col-md-6 col-sm-6 col-xs-12 hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30 vote">
                <?php
                $cv = $this->db->get_where('tbl_voted', ['voted_jabatan_id' => $c['calon_jabatan_id'], 'voted_dpt_nim' => $_SESSION['dpt_nim'], 'voted_type' => 's', 'voted_tahun' => $tahun])->row_array();
                if (!empty($cv) && $cv['voted_calon_id'] == $c['calon_id']) {
                    echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" style="background-color: greenyellow;" class="panel-body custom-panel-jw">';
                } else if (!empty($cv)) {
                    echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" style="background-color: #FFC0CB;" class="panel-body custom-panel-jw">';
                } else {
                    echo '<div id="v_' . $c['calon_id'] . '" jbt="j_' . $c['calon_jabatan_id'] . '" class="panel-body custom-panel-jw">';
                }
                ?>
                <div class="social-media-in">
                </div>
                <img alt="logo" class="m-b" src="<?= base_url('poster/' . $c['calon_poster']) ?>">
                <?php
                $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                ?>
                <h3 style="text-align: center;">
                    <?php
                    foreach ($kandidat as $in => $k) {
                        echo $k['kandidat_nama'];
                        if ($in !== count($kandidat) - 1) {
                            echo ' - ';
                        }
                    }
                    ?>
                </h3>
                <br>
            </div>
    </div>
<?php endforeach ?>
</div>
<?php endforeach ?>
</div>
</div>
<!-- Modal hapus pembicara -->
<div class="modal fade" id="vot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script>
    $('.vote').click(function() {
        $('#calon').html('<h3 style="text-align:center">Memuat...</h3>');
        var id = $(this).attr('id_calon');
        var tahun = $('#tahun').val();
        $.ajax({
            url: '<?= base_url('dpt/Pemilihan/get_calon') ?>',
            type: 'post',
            data: {
                id: id,
                tahun: tahun
            },
            success: function(data) {
                $('#calon').html(data);
            }
        });
    });
    $(document).on('click', '.warn', function() {
        $(this).attr('id', 'voted');
        $('#war').html('<div class="alert alert-warning" role="alert"><b>PERINGATAN!</b> Pilihan yang sudah anda pilih tidak bisa berubah!! tekan Voted lagi untuk memilih</div>');
    });
    $(document).on('click', '#voted', function() {
        $(this).attr('disabled', 'disabled');
        var id = $(this).attr('id_calon');
        var id_jabatan = $(this).attr('id_jabatan');
        var type = $(this).attr('tipe');
        var tahun = $('#tahun').val();
        $.ajax({
            url: '<?= base_url('dpt/Pemilihan/voted') ?>',
            type: 'post',
            data: {
                id: id,
                id_jabatan: id_jabatan,
                type: type,
                tahun: tahun
            },
            success: function(data) {
                if (data == 'done') {
                    $('#sertif').html('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="breadcome-list single-page-breadcome"><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="breadcome-heading"><h3>Download sertifikat</h3><a id="cetak_sertif" download="<?= $tahun . '-' . $_SESSION['dpt_nim'] . '.jpg'?>" href="<?= base_url('all_sertif/' . $tahun . '-' . $_SESSION['dpt_nim'] . '-' . $tahun_sertif) ?>" title="Cetak Sertif"><button class="btn btn-primary">Download</button></a></div></div></div></div></div></div>');
                    $('#calon').html('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3>Hore..</h3><p>Terimakasih anda sudah memilih, silahkan mendownload sertifikat</p><div class="breadcome-list single-page-breadcome"><div class="row"><a id="cetak_sertif" download="<?= $tahun . '-' . $_SESSION['dpt_nim'] . '.jpg'?>" href="<?= base_url('all_sertif/' . $tahun . '-' . $_SESSION['dpt_nim'] . '.jpg') ?>" title="Cetak Sertif"><img style="width:100%;" src="<?= base_url('all_sertif/' . $tahun . '-' . $_SESSION['dpt_nim'] . '.jpg') ?>" ></a><p>Click sertifikat untuk mendownload</p></div></div></div></div>');
                }
                $("div[jbt=j_" + id_jabatan + "]").css('backgroundColor', '#FFC0CB');
                $('#v_' + id).css('backgroundColor', 'greenyellow');
                $('#confirm').html('<div class="alert alert-success" role="alert">Terimakasih sudah memilih</div>');
            }
        });
    });
</script>