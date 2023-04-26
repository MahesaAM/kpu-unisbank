<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Daftar Yang Sudah Memilih</h3>
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
                            <br>
                            <input id="cari" type="text" class="form-control" placeholder="Cari Dpt dengan NIM / NAMA">
                            <br>
                            <table class="text-nowrap" id="table" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Fakultas</th>
                                        <th>Progdi</th>
                                    </tr>
                                </thead>
                                <tbody id="list_pemilih">

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
            $('#list_pemilih').html('<tr><td colspan="5">Memuat.. mohon tunggu</td></tr>');
            var key = $(this).val();
            if (key.length > 3) {
                $.ajax({
                    url: '<?= base_url('administrator/Pemilihan/get_pemilih') ?>',
                    type: 'post',
                    data: {
                        key: key,
                        tahun: '<?= $this->uri->segment(4) ?>'
                    },
                    success: function(data) {
                        $('#list_pemilih').html(data);
                    }
                });
            } else {
                $('#list_pemilih').html('<tr><td colspan="5">Masukan milimal 4 charackter</td></tr>');
            }

        });
    </script>