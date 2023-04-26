<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Daftar Admin</h3>
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
                            <button data-toggle="modal" data-target="#buat" class="btn btn-danger">Tambah Admin</button>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="text-nowrap" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th style="width: 100px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($admin as $a) : ?>
                                        <tr id="r<?= $a['admin_id'] ?>">
                                            <td><?= $no++ ?></td>
                                            <td><?= $a['admin_nama'] ?></td>
                                            <td><?= $a['admin_username'] ?></td>
                                            <td>
                                                <a style="color: white;" data-toggle="modal" data-target="#edit" class="btn btn-primary" onclick="edit('<?= $a['admin_id'] ?>','<?= $a['admin_nama'] ?>','<?= $a['admin_username'] ?>','<?= $a['admin_password'] ?>')"><i class="fa fa-pencil"></i></a>
                                                <a style="color: white;" data-toggle="modal" data-target="#hapus" class="btn btn-danger" onclick="del('<?= $a['admin_id'] ?>')"><i class="fa fa-trash"></i></a>
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
    <!-- Modal hapus peserta -->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_hapus">
                        <h4>Apakah Anda Yakin ?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                    <button id="tombol_hapus" class="btn btn-danger" data-dismiss="modal">Iya</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="buat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert"></div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" required class="form-control nim" id="nama_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" required class="form-control" id="username_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" required class="form-control" id="password_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">ulang Password</label>
                        <input type="password" required class="form-control" id="ulang_password_tambah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="tombol_tambah" class="btn btn-danger">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_edit"></div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" required class="form-control nim" id="nama_edit">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" required class="form-control" id="username_edit">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" required class="form-control" id="password_edit">
                        <input type="hidden" required class="form-control" id="password_lama_edit">
                    </div>
                    <div class="form-group">
                        <label for="">ulang Password</label>
                        <input type="password" required class="form-control" id="ulang_password_edit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="tombol_edit" class="btn btn-danger">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tombol_tambah').click(function() {
            var nama = $('#nama_tambah').val();
            var username = $('#username_tambah').val();
            var password = $('#password_tambah').val();
            var ulang_password = $('#ulang_password_tambah').val();
            if (nama != '' && username != '' && password != '' && ulang_password != '') {
                if (password == ulang_password) {
                    $.ajax({
                        url: '<?= base_url('administrator/Admin/tambah_admin') ?>',
                        type: 'post',
                        data: {
                            nama: nama,
                            username: username,
                            password: password
                        },
                        success: function(data) {
                            $('#alert').html('<div class="alert alert-success" role="alert">Berhasil</div>');
                            setTimeout(function() {
                                window.location.href = '<?= base_url('administrator/Admin'); ?>';
                            }, 1000);
                        }
                    });
                } else {
                    $('#alert').html('<div class="alert alert-danger" role="alert">Password tidak sama</div>');
                }
            } else {
                $('#alert').html('<div class="alert alert-danger" role="alert">Tidak Boleh Kosong</div>');
            }
        });

        function edit(id, nama, username, password) {
            $('#nama_edit').val(nama);
            $('#username_edit').val(username);
            $('#tombol_edit').attr('id_admin', id);
        }
        $('#tombol_edit').click(function() {
            var id = $(this).attr('id_admin');
            var nama = $('#nama_edit').val();
            var username = $('#username_edit').val();
            var password = $('#password_edit').val();
            if (nama != '' && username != '') {
                $.ajax({
                    url: '<?= base_url('administrator/Admin/edit_admin') ?>',
                    type: 'post',
                    data: {
                        id: id,
                        nama: nama,
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        $('#alert_edit').html('<div class="alert alert-success" role="alert">Berhasil</div>');
                        setTimeout(function() {
                            window.location.href = '<?= base_url('administrator/Admin'); ?>';
                        }, 1000);
                    }
                });
            } else {
                $('#alert_edit').html('<div class="alert alert-danger" role="alert">Tidak Boleh Kosong</div>');
            }
        });

        function del(id) {
            $('#tombol_hapus').attr('id_admin', id);
        }
        $('#tombol_hapus').click(function() {
            var id = $(this).attr('id_admin');
            $.ajax({
                url: '<?= base_url('administrator/Admin/hapus_admin') ?>',
                type: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#r' + id).fadeOut();
                }
            });
        });
    </script>