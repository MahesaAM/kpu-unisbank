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
                            <button data-toggle="modal" data-target="#buat" class="btn btn-danger">Buat Pemilihan</button>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="text-nowrap" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Statik</th>
                                        <th>Sertifikat</th>
                                        <th>Calon</th>
                                        <th style="width: 100px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="list_tahun">
                                    <?php foreach ($tahun as $t) : ?>
                                        <tr id="r<?= $t['tahun_id'] ?>">
                                            <td><?= $t['tahun_tahun'] ?></td>
                                            <td><?= $t['tahun_mulai'] ?></td>
                                            <td><?= $t['tahun_akhir'] ?></td>
                                            <td>
                                                <a style="color: white;" href="<?= base_url('administrator/Pemilihan/statik/' . $t['tahun_tahun']) ?>" class="btn btn-info"><i class="fa fa-bar-chart"></i></a>
                                            </td>
                                            <td>
                                                <a style="color: white;" href="<?= base_url('administrator/Pemilihan/sertif/' . $t['tahun_tahun']) ?>" class="btn btn-info"><i class="fa fa-certificate"></i></a>
                                            </td>
                                            <td>
                                                <a style="color: white;" href="<?= base_url('administrator/Pemilihan/jabatan/' . $t['tahun_tahun']) ?>" class="btn btn-warning"><i class="fa fa-users"></i></a>
                                            </td>
                                            <td>
                                                <a style="color: white;" data-toggle="modal" data-target="#edit" class="btn btn-primary" onclick="edit('<?= $t['tahun_id'] ?>','<?= $t['tahun_mulai'] ?>','<?= $t['tahun_akhir'] ?>')"><i class="fa fa-pencil"></i></a>
                                                <a style="color: white;" data-toggle="modal" data-target="#hapus" class="btn btn-danger" onclick="del('<?= $t['tahun_id'] ?>','<?= $t['tahun_tahun'] ?>')"><i class="fa fa-trash"></i></a>
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
                    <button id="tombol_hapus" class="btn btn-danger">Iya</button>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Mulai</label>
                                <input id="mulai" type="date" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Akhir</label>
                                <input id="akhir" type="date" required class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="tombolBuat" class="btn btn-danger">Iya</button>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Mulai</label>
                                <input id="mulai_edit" type="date" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Akhir</label>
                                <input id="akhir_edit" type="date" required class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="tombolEdit" class="btn btn-danger">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del(id, t) {
            $('#tombol_hapus').attr('id_tahun', id);
            $('#tombol_hapus').attr('tahun_tahun', t);
        }

        function edit(id, mulai, akhir) {
            $('#tombolEdit').attr('tahun_id', id);
            $('#mulai_edit').val(mulai);
            $('#akhir_edit').val(akhir);
        }
        $('#tombol_hapus').click(function() {
            var id = $(this).attr('id_tahun');
            var t = $(this).attr('tahun_tahun');
            $.ajax({
                url: '<?= base_url('administrator/Pemilihan/hapus') ?>',
                type: 'POST',
                data: {
                    id: id,
                    t: t
                },
                success: function(data) {
                    $('#alert_hapus').html('<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
                    setTimeout(function() {
                        window.location.href = '<?= base_url('administrator/Pemilihan'); ?>';
                    }, 1000);
                }
            });
        })

        function tombolBuat() {
            var mulai = $('#mulai').val();
            var akhir = $('#akhir').val();
            var d = new Date(mulai);
            var year = d.getFullYear();
            $('#alert').html('<div class="alert alert-info" role="alert">Membuat...</div>');
            if (mulai < year) {
                $('#alert').html('<div class="alert alert-danger" role="alert">Tahun sudah terlewat</div>');
            } else if (mulai == '' || akhir == '') {
                $('#alert').html('<div class="alert alert-danger" role="alert">Tidak Boleh Kosong!!</div>');
            } else {
                $.ajax({
                    type: 'post',
                    url: '<?= base_url('administrator/Pemilihan/buat') ?>',
                    dataType: 'JSON',
                    data: {
                        mulai: mulai,
                        akhir: akhir
                    },
                    success: function(data) {
                        if (data[0] == 'success') {
                            $('#alert').html('<div class="alert alert-success" role="alert">Berhasil</div>');
                            setTimeout(function() {
                                window.location.href = '<?= base_url('administrator/Pemilihan/jabatan/'); ?>' + data[1];
                            }, 1000);
                        } else {
                            $('#alert').html('<div class="alert alert-danger" role="alert">tahun sudah pernah dibuat</div>');
                        }
                    }
                });
            }
        }
        $('#tombolEdit').click(function() {
            var id = $(this).attr('tahun_id');
            var mulai = $('#mulai_edit').val();
            var akhir = $('#akhir_edit').val();
            var d = new Date(mulai);
            var year = d.getFullYear();
            if (mulai < year) {
                $('#alert_edit').html('<div class="alert alert-danger" role="alert">Tahun sudah terlewat</div>');
            } else if (mulai == '' || akhir == '') {
                $('#alert_edit').html('<div class="alert alert-danger" role="alert">Tidak Boleh Kosong!!</div>');
            } else {
                $.ajax({
                    type: 'post',
                    url: '<?= base_url('administrator/Pemilihan/edit') ?>',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        mulai: mulai,
                        akhir: akhir
                    },
                    success: function(data) {
                        $('#alert_edit').html('<div class="alert alert-success" role="alert">Berhasil</div>');
                        setTimeout(function() {
                            window.location.href = '<?= base_url('administrator/Pemilihan'); ?>';
                        }, 1000);
                    }
                });
            }
        });
        $('#tombolBuat').click(function() {
            tombolBuat();
        });
        $(document).on('keypress', function(e) {
            if (e.which == 13) {
                tombolBuat();
            }
        });
    </script>