<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Lembaga Kemahasiswaan</h3>
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
                            <div class="row">
                                <?php foreach ($unv as $u) : ?>
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><?= $u['jabatan_nama'] ?></h3>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><?= $u['jabatan_nama'] ?></td>
                                                        <td><a style="color:white;" href="<?= base_url('administrator/Pemilihan/calon/' . $this->uri->segment(4) . '/' . $u['jabatan_id'] . '/m') ?>" class="btn btn-primary"><i class="fa fa-users"></i></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php foreach ($fak as $f) : ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading<?= $f['jabatan_id'] ?>">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $f['jabatan_id'] ?>" aria-expanded="false" aria-controls="collapse<?= $f['jabatan_id'] ?>">
                                                    <?= $f['jabatan_nama'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $f['jabatan_id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $f['jabatan_id'] ?>">
                                            <div class="panel-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><?= $f['jabatan_nama'] ?></td>
                                                        <td><a style="color:white;" href="<?= base_url('administrator/Pemilihan/calon/' . $this->uri->segment(4) . '/' . $f['jabatan_id'] . '/m') ?>" class="btn btn-primary text-white"><i class="fa fa-users"></i></a></td>
                                                    </tr>
                                                </table>
                                                <label for="">HMPS</label>
                                                <hr>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <?php
                                                        $hmps = $this->db->get_where('tbl_jabatan_sub', ['sub_jabatan_id' => $f['jabatan_id']])->result_array();
                                                        foreach ($hmps as $h) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $h['sub_nama'] ?></td>
                                                                <td><a style="color:white;" href="<?= base_url('administrator/Pemilihan/calon/' . $this->uri->segment(4) . '/' . $h['sub_id'] . '/s') ?>" class="btn btn-primary text-white"><i class="fa fa-users"></i></a></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>