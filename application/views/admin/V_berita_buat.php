<script>
    $(document).ready(function() {
        $("#txtEditor").Editor();
    });
</script>
<link href="<?= base_url('assets/admin/') ?>editor.css" type="text/css" rel="stylesheet" />
<script src="<?= base_url('assets/admin/') ?>editor.js"></script>
<!-- Basic Form Start -->
<form enctype="multipart/form-data" id="publish">
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <h3>Berita</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <button style="float: right;" type="submit" class="btn btn-primary">Publish</button>
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
                            <div id="alert">

                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline12-list">
                                        <div class="sparkline12-hd">

                                        </div>
                                        <div class="sparkline12-graph">
                                            <div class="basic-login-form-ad">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="">Judul</label>
                                                        <input type="text" name="judul" id="judul" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Cover</label>
                                                        <p>Gambar dengan ratio 1:1</p>
                                                        <input type="file" name="cover" id="cover" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 nopadding">
                                                        <textarea id="txtEditor"></textarea>
                                                        <!-- <input type="hidden" name="isi" id="isi" class="form-control"> -->
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
            </div>


        </div>
    </div>
</form>
<div class="modal fade" id="buat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert_hapus">
                    <div id="alert">
                        <div class="alert alert-info" role="alert">Mohon tunggu</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    // setInterval(function() {
    //     $('#isi').val($('#txtEditor').Editor('getText'));
    // }, 300);
    $(function() {
        $('#publish').on('submit', function(e) {
            var judul = $('#judul').val();
            var isi = $('#txtEditor').Editor('getText');

            var data = new FormData(this);
            data.append('judul', judul);
            data.append('isi', isi);

            $.ajax({
                url: '<?= base_url(), 'administrator/Berita/publish' ?>',
                type: "post",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: true,
                success: function(data) {
                    $('#alert').html('<div class="alert alert-success" role="alert">Berhasil mempublish</div>');
                }
            });
            e.preventDefault();
        });
    });
</script>