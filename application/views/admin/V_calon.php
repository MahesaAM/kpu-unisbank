<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Daftar Calon</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <a href="<?= base_url('administrator/Pemilihan/jabatan/' . $this->uri->segment(4)) ?>" style="float: right;" class="btn btn-danger">Kembali</a>
                                <button style="float: right;" data-toggle="modal" data-target="#tambah_paslon" class="btn btn-primary">Tambah Calon</button>
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
        <div class="row">
            <?php foreach ($calon as $c) : ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                        <div class="panel-body custom-panel-jw">
                            <div class="social-media-in">
                            </div>
                            <img alt="logo" class="m-b" src="<?= base_url('poster/' . $c['calon_poster']) ?>">
                            <?php $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array(); ?>
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
                        <div class="panel-footer contact-footer">
                            <div class="professor-stds-int">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="contact-stat"><button data-toggle="modal" data-target="#edit_calon<?= $c['calon_id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</button></div>
                                                </td>
                                                <td>
                                                    <div class="contact-stat"><button data-toggle="modal" data-target="#hapus_calon<?= $c['calon_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah_paslon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_Url('administrator/Pemilihan/tambah_calon') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_jabatan" value="<?= $this->uri->segment(5) ?>">
                    <input type="hidden" name="tahun" value="<?= $this->uri->segment(4) ?>">
                    <input type="hidden" name="type" value="<?= $this->uri->segment(6) ?>">
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Poster</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="file" required name="poster" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">VISI</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <textarea name="visi" required class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">MISI</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <textarea name="misi" required class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="calon"></div>
                    <br>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <button type="button" id="tambah_calon" class="btn btn-prima/pry btn-sm"><i class="fa fa-plus"></i> Tambah Calon</button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ($calon as $c) : ?>
    <div class="modal fade" id="edit_calon<?= $c['calon_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_Url('administrator/Pemilihan/edit_calon') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_jabatan" value="<?= $this->uri->segment(5) ?>">
                        <input type="hidden" name="id_calon" value="<?= $c['calon_id'] ?>">
                        <input type="hidden" name="tahun" value="<?= $this->uri->segment(4) ?>">
                        <input type="hidden" name="type" value="<?= $this->uri->segment(6) ?>">
                        <input type="hidden" name="poster_default" value="<?= $c['calon_poster'] ?>">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Poster</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="poster" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">VISI</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="visi" required class="form-control" cols="30" rows="3"><?= $c['calon_visi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">MISI</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="misi" required class="form-control" cols="30" rows="3"><?= $c['calon_misi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="calon_<?= $c['calon_id'] ?>">
                            <?php
                            $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                            $nomor = 0;
                            foreach ($kandidat as $k) :
                                $nomor++;
                            ?>
                                <br>
                                <div class="baris">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td><b>Calon</b></td>
                                                        <td class="pull-right"><button id_c="<?= $k['kandidat_id'] ?>" id="hapus" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro"> Nama </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="<?= $k['kandidat_nama'] ?>" required name="nama[]" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Sebagai</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="<?= $k['kandidat_sebagai'] ?>" required name="sebagai[]" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Nim</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="<?= $k['kandidat_nim'] ?>" required name="nim[]" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Fakultas</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="<?= $k['kandidat_fakultas'] ?>" required name="fakultas[]" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Progdi</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="<?= $k['kandidat_progdi'] ?>" required name="progdi[]" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <br>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <button type="button" id="tambah_calon_<?= $c['calon_id'] ?>" class="btn btn-prima/pry btn-sm"><i class="fa fa-plus"></i> Tambah Calon</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Modal hapus pembicara -->
<?php foreach ($calon as $c) : ?>
    <div class="modal fade" id="hapus_calon<?= $c['calon_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('administrator/Pemilihan/hapus_calon') ?>" method="post">
                        <input type="hidden" value="<?= $c['calon_id'] ?>" name="id">
                        <input type="hidden" name="id_jabatan" value="<?= $this->uri->segment(5) ?>">
                        <input type="hidden" name="tahun" value="<?= $this->uri->segment(4) ?>">
                        <input type="hidden" name="type" value="<?= $this->uri->segment(6) ?>">
                        <input type="hidden" name="poster" value="<?= $c['calon_poster'] ?>">
                        <h4>Apakah Anda Yakin Ingin Menghapus ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Iya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<script>
    $(document).ready(function() {
        var nomor = 0;
        $('#tambah_calon').click(function() {
            nomor++;
            $('#calon').append('<br><div class="baris"><div class="form-group-inner"><div class="row"><div class = "col-lg-2 col-md-3 col-sm-3 col-xs-12" ></div> <div class = "col-lg-9 col-md-9 col-sm-9 col-xs-12" ><table style="width:100%;"><tr><td><b>Calon</b></td><td class="pull-right"><button type="button" id="hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td></tr></table> </div> </div> </div> <div class = "form-group-inner"><div class = "row"><div class = "col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class = "login2 pull-right pull-right-pro"> Nama </label></div> <div class = "col-lg-9 col-md-9 col-sm-9 col-xs-12"><input name="nomor[]" value="' + nomor + '" type="hidden"> <input type = "text" required name = "nama_' + nomor + '" class = "form-control" /> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Sebagai</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" required name="sebagai_' + nomor + '" class="form-control"/> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Nim</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" required name="nim_' + nomor + '" class="form-control"/> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Fakultas</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" required name="fakultas_' + nomor + '" class="form-control" /> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Progdi</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"> <input type="text" required name="progdi_' + nomor + '" class="form-control"/> </div></div></div></div>');
        });
        var no = 0;
        <?php foreach ($calon as $c) : ?>
            $('#tambah_calon_<?= $c['calon_id'] ?>').click(function() {
                no++;
                $('#calon_<?= $c['calon_id'] ?>').append('<br><div class="baris"><div class="form-group-inner"><div class="row"><div class = "col-lg-2 col-md-3 col-sm-3 col-xs-12" ></div> <div class = "col-lg-9 col-md-9 col-sm-9 col-xs-12" ><table style="width:100%;"><tr><td><b>Calon</b></td><td class="pull-right"><button type="button" id="hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td></tr></table> </div> </div> </div> <div class = "form-group-inner"><div class = "row"><div class = "col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class = "login2 pull-right pull-right-pro"> Nama </label></div> <div class = "col-lg-9 col-md-9 col-sm-9 col-xs-12"> <input type = "text" required name = "nama[]" class = "form-control" /> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Sebagai</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" required name="sebagai[]" class="form-control"/> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Nim</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" required name="nim[]" class="form-control"/> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Fakultas</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" required name="fakultas[]" class="form-control" /> </div></div> </div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label class="login2 pull-right pull-right-pro">Progdi</label> </div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"> <input type="text" required name="progdi[]" class="form-control"/> </div></div></div></div>');
            });
        <?php endforeach ?>
        $(document).on('click', '#hapus', function() {
            $(this).parents(".baris").remove();
        });
        $(document).on('click', '#hapus', function() {
            var id = $(this).attr('id_c');
            $.ajax({
                url: '<?= base_url('administrator/Pemilihan/del_kandidat') ?>',
                type: 'post',
                data: {
                    id: id
                },
                beforeSend: function() {
                    return confirm("Apa anda yakin?");
                },
                success: function(data) {
                    $(this).parents(".baris").remove();
                }
            });
        });

    });
</script>