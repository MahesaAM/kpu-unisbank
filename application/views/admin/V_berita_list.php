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
                            <a href="<?= base_url('administrator/Berita/tambah') ?>" class="btn btn-danger">Buat Berita</a>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="text-nowrap" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th style="width: 100px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($berita as $b) : ?>
                                        <tr id="r<?= $b['berita_id'] ?>">
                                            <td><?= $no++ ?></td>
                                            <td><?= $b['berita_judul'] ?></td>
                                            <td><?= $b['berita_tanggal'] ?></td>
                                            <td>
                                                <a href="<?= base_url('administrator/Berita/edit/' . $b['berita_id']) ?>" style="color: white;" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                <a style="color: white;" data-toggle="modal" data-target="#hapus" class="btn btn-danger" onclick="del('<?= $b['berita_id'] ?>','<?= $b['berita_cover'] ?>')"><i class="fa fa-trash"></i></a>
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

    <script>
        function del(id, cover) {
            $('#tombol_hapus').attr('berita_id', id);
            $('#tombol_hapus').attr('cover', cover);
        }
        $('#tombol_hapus').click(function() {
            let id = $(this).attr('berita_id');
            let cover = $(this).attr('cover');
            $.ajax({
                url: '<?= base_url('administrator/Berita/hapus') ?>',
                type: 'post',
                data: {
                    id: id,
                    cover: cover
                },
                success: function(data) {
                    $('#r' + id).remove();
                }
            });
        });
    </script>