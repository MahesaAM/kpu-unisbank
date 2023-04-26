<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Pemilihan</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="text-nowrap" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lembaga Kemahasiswaan</th>
                                        <th style="width: 100px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($unv as $u) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $u['jabatan_nama'] ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit_u<?= $u['jabatan_id'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <button data-toggle="modal" data-target="#buat" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah BEM Fakultas</button>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="text-nowrap" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lembaga Kemahasiswaan</th>
                                        <th>Fakultas</th>
                                        <th>HMPS</th>
                                        <th style="width: 100px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($fak as $f) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $f['jabatan_nama'] ?></td>
                                            <td><?= $f['jabatan_fak'] ?></td>
                                            <td>
                                                <a fak="<?= $f['jabatan_fak'] ?>" jabatan-id="<?= $f['jabatan_id'] ?>" style="color: white;" data-toggle="modal" data-target="#list" class="btn btn-warning btn-sm sub"><i class="fa fa-list"></i></a>
                                            </td>
                                            <td>
                                                <a style="color: white;" data-toggle="modal" data-target="#edit<?= $f['jabatan_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a style="color: white;" data-toggle="modal" data-target="#hapus<?= $f['jabatan_id'] ?>" class="btn btn-danger btn-sm" onclick="del(<?= $f['jabatan_id'] ?>)"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal hapus peserta -->
                        <?php foreach ($fak as $f) : ?>
                            <div class="modal fade" id="hapus<?= $f['jabatan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('administrator/Jabatan/hapus') ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $f['jabatan_id'] ?>">
                                                <h4>Apakah Anda Yakin ?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                                            <button id="tombol_hapus" class="btn btn-danger">Iya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class="modal fade" id="buat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('administrator/Jabatan/tambah') ?>" method="POST">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input placeholder="Masukan Nama BEM-F" name="jabatan" type="text" required class="form-control">
                                                </div>
                                                <div class="col-md-5">
                                                    <input placeholder="Masukan Nama fakultas" name="fak" type="text" required class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" name="iya" class="btn btn-danger">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($fak as $f) : ?>
                            <div class="modal fade" id="edit<?= $f['jabatan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('administrator/Jabatan/edit') ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $f['jabatan_id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <input placeholder="Masukan Nama BEM-F" value="<?= $f['jabatan_nama'] ?>" name="jabatan" type="text" required class="form-control">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input placeholder="Masukan Nama fakultas" value="<?= $f['jabatan_fak'] ?>" name="fak" type="text" required class="form-control">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" name="iya" class="btn btn-danger">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php foreach ($unv as $u) : ?>
                            <div class="modal fade" id="edit_u<?= $u['jabatan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('administrator/Jabatan/edit') ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $u['jabatan_id'] ?>">
                                                <input placeholder="Masukan Nama Jabatan" value="<?= $u['jabatan_nama'] ?>" name="jabatan" type="text" required class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" name="iya" class="btn btn-danger">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>


                        <div style="padding:0px;" class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="alert-del"></div>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <input autofocus placeholder="Masukan Nama HMPS" id="nama_sub" type="text" required class="form-control">
                                                </td>
                                                <td>
                                                    <input placeholder="Masukan Nama Progdi" id="progdi_sub" type="text" required class="form-control">
                                                </td>
                                                <td>
                                                    <button id="tombol_tambah_sub" style="width: 100%;color:white;background-color:red;" class="form-control"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table border="1" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>HMPS</td>
                                                    <td>Nama Progdi</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="list_jabatan">
                                                <tr>
                                                    <td colspan="2">Memuat..</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        $(document).ready(function() {
            $(document).on('click', '.del-list', function() {
                var id = $(this).attr('id-j');
                $('#alert-del').html('<div class="alert alert-warning" role="alert"> Apakah anda yakin? <button j-id="' + id + '" id="btn-iya" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button> | <button id="btn-tidak" class="btn btn-default btn-sm"><i class="fa fa-times"></i></button></div>');
            });
            $(document).on('click', '#btn-iya', function() {
                var id = $(this).attr('j-id');
                $.ajax({
                    url: '<?= base_url('administrator/Jabatan/del_sub') ?>',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#alert-del').html('<div class="alert alert-success" role="alert"> Berhasil dihapus</div>');
                        $('#r' + id).remove();
                    }
                });
            });
            $(document).on('click', '#btn-tidak', function() {
                $('#alert-del').html('');
            });

            $(document).on('click', '.sub', function() {
                $('#alert-del').html('');
                var id = $(this).attr('jabatan-id');
                var fak = $(this).attr('fak');
                $('#tombol_tambah_sub').attr('id-jabatan', id);
                $('#tombol_tambah_sub').attr('fak', fak);
                $.ajax({
                    url: '<?= base_url('administrator/Jabatan/sub_jabatan') ?>',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#list_jabatan').html(data);
                    }
                });
            })

            function tambah_jabatan() {
                var id = $('#tombol_tambah_sub').attr('id-jabatan');
                var fak = $('#tombol_tambah_sub').attr('fak');
                var jabatan = $('#nama_sub').val();
                var progdi = $('#progdi_sub').val();
                if (jabatan != '' && progdi != '') {
                    $.ajax({
                        url: '<?= base_url('administrator/Jabatan/tambah_sub_jabatan') ?>',
                        type: 'post',
                        dataType: 'JSON',
                        data: {
                            id: id,
                            jabatan: jabatan,
                            progdi: progdi,
                            fak: fak
                        },
                        success: function(data) {
                            if (data[0] == 'berhasil') {
                                $('#list_jabatan').append(data[1]);
                            }
                        }
                    })
                } else {
                    $('#alert').html('<div class="alert alert-danger" role="alert">Tidak boleh kosong!</div>');
                }
                $('#form_jabatan').val('');
                $('#progdi').val('');
            }
            $('#tombol_tambah_sub').click(function() {
                tambah_jabatan();
            });
            $(document).on('keypress', function(e) {
                if (e.which == 13) {
                    tambah_jabatan();
                }
            });
        });
    </script>