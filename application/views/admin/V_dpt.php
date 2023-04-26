<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Daftar Pemilih Tetap (DPT)</h3>
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
                            <button data-toggle="modal" data-target="#buat" class="btn btn-danger">Tambah DPT</button>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <br>
                            <input id="cari" type="text" class="form-control" placeholder="Cari Dpt dengan NIM / Nama">
                            <br>
                            <table class="text-nowrap" id="table" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Fakultas</th>
                                        <th>Progdi</th>
                                        <th>Password</th>
                                        <th style="width: 100px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="list_dpt">

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
                        <label for="">NIM</label>
                        <input type="text" required class="form-control nim" id="nim_tambah">
                        <p id="chk_tambah" class="text-danger pull-right"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" required class="form-control" id="nama_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" required class="form-control" id="hp_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" required class="form-control" id="email_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">Fakultas</label>
                        <input type="text" required class="form-control" id="fakultas_tambah">
                    </div>
                    <div class="form-group">
                        <label for="">Progdi</label>
                        <input type="text" required class="form-control" id="progdi_tambah">
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
                        <label for="">NIM</label>
                        <input type="text" required class="form-control nim" id="nim_edit">
                        <p id="chk_edit" class="text-danger pull-right"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" required class="form-control" id="nama_edit">
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" required class="form-control" id="hp_edit">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" required class="form-control" id="email_edit">
                    </div>
                    <div class="form-group">
                        <label for="">Fakultas</label>
                        <input type="text" required class="form-control" id="fakultas_edit">
                    </div>
                    <div class="form-group">
                        <label for="">Progdi</label>
                        <input type="text" required class="form-control" id="progdi_edit">
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
        $('#cari').keyup(function() {
            $('#list_dpt').html('<tr><td colspan="5">Memuat.. mohon tunggu</td></tr>');
            var key = $(this).val();
            if (key.length > 3) {
                $.ajax({
                    url: '<?= base_url('administrator/Dpt/get_dpt') ?>',
                    type: 'post',
                    data: {
                        key: key
                    },
                    success: function(data) {
                        $('#list_dpt').html(data);
                    }
                });
            } else {
                $('#list_dpt').html('<tr><td colspan="5">Masukan milimal 4 charackter</td></tr>');
            }

        });
        $('#nim_tambah').keyup(function() {
            var val = $(this).val();
            $.ajax({
                url: '<?= base_url('administrator/Dpt/check_nim') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    val: val
                },
                success: function(data) {
                    if (data[0] == '1') {
                        $('#chk_tambah').html('NIM sudah ada!');
                        $('#tombol_tambah').attr('disabled', 'disabled');
                    } else {
                        $('#chk_tambah').html('');
                        $('#tombol_tambah').removeAttr('disabled', 'disabled');
                    }
                }
            });
        });
        $(document).on('keyup', '#nim_edit', function() {
            var val = $(this).val();
            var nim = $(this).attr('nim');
            $.ajax({
                url: '<?= base_url('administrator/Dpt/check_nim') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    val: val
                },
                success: function(data) {
                    if (data[0] == '1') {
                        if (data[1] != nim) {
                            $('#chk_edit').html('NIM sudah ada!');
                            $('#tombol_edit').attr('disabled', 'disabled');
                        }
                    } else {
                        $('#chk_edit').html('');
                        $('#tombol_edit').removeAttr('disabled', 'disabled');
                    }
                }
            });
        });
        $(document).on('click', '#tombol_tambah', function() {
            var nim = $('#nim_tambah').val();
            var nama = $('#nama_tambah').val();
            var hp = $('#hp_tambah').val();
            var email = $('#email_tambah').val();
            var fakultas = $('#fakultas_tambah').val();
            var progdi = $('#progdi_tambah').val();
            if (nim != '' && nama != '' && fakultas != '' && progdi != '') {
                $.ajax({
                    url: '<?= base_url('administrator/Dpt/tambah_dpt') ?>',
                    type: 'post',
                    data: {
                        nim: nim,
                        nama: nama,
                        hp: hp,
                        email: email,
                        fakultas: fakultas,
                        progdi: progdi
                    },
                    success: function(data) {
                        $('#alert').html('<div class="alert alert-success" role="alert">Berhasil</div>');
                        setTimeout(function() {
                            window.location.href = '<?= base_url('administrator/Dpt'); ?>';
                        }, 1000);
                    }
                });
            } else {
                $('#alert').html('<div class="alert alert-danger" role="alert">Tidak Boleh Kosong</div>');
            }
        });

        $(document).on('click', '.edit', function() {
            $('#nim_edit').val($(this).attr('nim'));
            $('#nim_edit').attr('nim', $(this).attr('nim'));
            $('#tombol_edit').attr('dpt_id', $(this).attr('dpt_id'));
            $('#nama_edit').val($(this).attr('nama'));
            $('#hp_edit').val($(this).attr('hp'));
            $('#email_edit').val($(this).attr('email'));
            $('#fakultas_edit').val($(this).attr('fakultas'));
            $('#progdi_edit').val($(this).attr('progdi'));
        });
        $('#tombol_edit').click(function() {
            var id = $(this).attr('dpt_id');
            var nim = $('#nim_edit').val();
            var nama = $('#nama_edit').val();
            var hp = $('#hp_edit').val();
            var email = $('#email_edit').val();
            var fakultas = $('#fakultas_edit').val();
            var progdi = $('#progdi_edit').val();
            if (nim != '' && nama != '' && fakultas != '' && progdi != '') {
                $.ajax({
                    url: '<?= base_url('administrator/Dpt/edit_dpt') ?>',
                    type: 'post',
                    data: {
                        id: id,
                        nim: nim,
                        nama: nama,
                        hp: hp,
                        email: email,
                        fakultas: fakultas,
                        progdi: progdi
                    },
                    success: function(data) {
                        $('#alert_edit').html('<div class="alert alert-success" role="alert">Berhasil</div>');
                        setTimeout(function() {
                            window.location.href = '<?= base_url('administrator/Dpt'); ?>';
                        }, 1000);
                    }
                });
            } else {
                $('#alert_edit').html('<div class="alert alert-danger" role="alert">Tidak Boleh Kosong</div>');
            }
        });

        $(document).on('click', '.delete', function() {
            $('#tombol_hapus').attr('id_dpt', $(this).attr('dpt_id'));
        });
        $('#tombol_hapus').click(function() {
            var id = $(this).attr('id_dpt');
            $.ajax({
                url: '<?= base_url('administrator/Dpt/hapus_dpt') ?>',
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