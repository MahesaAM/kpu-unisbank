<?php
class Pemilihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $nim = $this->session->userdata('dpt_nim');
        $c = $this->db->get_where('tbl_dpt', ['dpt_nim' => $nim])->row_array();
        if (empty($c)) {
            redirect('Auth');
            die();
        }
        $this->load->model('M_dpt');
    }

    function index()
    {
        $y['title'] = 'Pemilihan';
        $t = $this->M_dpt->get_all_tahun()->row_array();
        $x['tahun'] = $t['tahun_tahun'];
        $x['tahun_sertif'] = $t['tahun_sertif'];
        $x['sertif'] = $this->M_dpt->get_voted($_SESSION['dpt_nim'], $t['tahun_tahun'])->num_rows();
        $x['unv'] = $this->M_dpt->get_unv($t['tahun_tahun'])->result_array();
        $x['fak'] = $this->M_dpt->get_fak($t['tahun_tahun'], $_SESSION['dpt_fakultas'])->result_array();
        $x['hmps'] = $this->M_dpt->get_hmps($t['tahun_tahun'], $_SESSION['dpt_fakultas'], $_SESSION['dpt_progdi'])->result_array();
        $this->load->view('dpt/template/V_header', $y);
        $this->load->view('dpt/V_pemilihan', $x);
        $this->load->view('dpt/template/V_footer');
    }
    function get_calon()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $c = $this->M_dpt->get_calon($id)->row_array();
        $html = '<div class="row">
        <div class="col-md-12"><img style="width:100%;" class="m-b mx-auto" src="' . base_url('poster/' . $c['calon_poster']) . '"></div>';
        $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
        $html .= '
        </div>
        <br>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse" class="collapsed panel-heading" role="tab" id="heading">
                <h4 class="panel-title">
                        Detail
                </h4>
            </div>
            <div id="collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
                <div class="panel-body">
        <div class="row">
        <div class="col-md-12">';
        foreach ($kandidat as $k) {
            $html .= '
            <br>
            <b>' . $k['kandidat_sebagai'] . '</b>
            <table style="width:100%;">
            <tr>
            <td>Nama</td><td>&nbsp : &nbsp</td><td>' . $k['kandidat_nama'] . '</td>
            </tr>
            <tr>
            <td>Fakultas</td><td>&nbsp : &nbsp</td><td>' . $k['kandidat_fakultas'] . '</td>
            </tr>
            <tr>
            <td>Progdi</td><td>&nbsp : &nbsp</td><td>' . $k['kandidat_progdi'] . '</td>
            </tr>
            </table>';
        }
        $html .= '</div>
        </div>
        <div class="row">
        <br>
            <div class="col-md-12">
            <b>Visi</b>
            <p>' . $c['calon_visi'] . '</p>
            <b>Misi</b>
            <p>' . $c['calon_misi'] . '</p>
            </div>
            </div></div>
            </div>
        </div>
    </div>
        <div class="row">
        <div class="col-md-12">
        <br>
        <div id="confirm">
        <div id="war"></div>';
        $tanggal = date('Y-m-d');
        $t = $this->db->get_where('tbl_tahun', ['tahun_tahun' => $tahun])->row_array();
        if ($tanggal >= date('Y-m-d', strtotime($t['tahun_mulai'])) && $tanggal <= date('Y-m-d', strtotime($t['tahun_akhir']))) {
            $v = $this->db->get_where('tbl_voted', ['voted_dpt_nim' => $_SESSION['dpt_nim'], 'voted_jabatan_id' => $c['calon_jabatan_id'], 'voted_tahun' => $tahun])->row_array();
            if (!empty($v) && $v['voted_jabatan_id'] == $c['calon_jabatan_id'] && $v['voted_calon_id'] == $c['calon_id']) {
                echo '<div class="alert alert-success" role="alert">Pilihan anda</div>';
            } else if (!empty($v) && $v['voted_jabatan_id'] == $c['calon_jabatan_id']) {
            } else {
                $html .= '<button id_calon="' . $id . '" id_jabatan="' . $c['calon_jabatan_id'] . '" tipe="' . $c['calon_type'] . '" style="width:100%;" class="btn btn-success btn-lg warn">Vote</button>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Pemilihan sudah selesai/belum dimulai</div>';
        }

        $html .= '</div>
        </div>
        </div>';
        echo $html;
    }
    function voted()
    {
        $id_calon = $this->input->post('id');
        $id_jabatan = $this->input->post('id_jabatan');
        $type = $this->input->post('type');
        $tahun = $this->input->post('tahun');
        $nim = $_SESSION['dpt_nim'];
        $tanggal = date('Y-m-d');
        $this->M_dpt->voted($id_calon, $id_jabatan, $type, $nim, $tanggal, $tahun);
        $chk = $this->db->get_where('tbl_voted', ['voted_dpt_nim' => $_SESSION['dpt_nim'], 'voted_tahun' => $tahun])->num_rows();
        if ($chk == 4) {
            echo 'done';
            $t = $this->db->get_where('tbl_tahun', ['tahun_tahun' => $tahun])->row_array();
            $font = "./arial.ttf";
            $image = imagecreatefromjpeg("./sertif/" . $t['tahun_sertif']);
            $color = imagecolorallocate($image, 0, 0, 0);
            $name = $_SESSION['dpt_nama'];
            imagettftext($image, $t['tahun_sertif_ukuran'], 0, $t['tahun_sertif_horizontal'], $t['tahun_sertif_vertical'], $color, $font, $name);
            imagejpeg($image, "all_sertif/" . $t['tahun_tahun'] . '-' . $_SESSION['dpt_nim'].'.jpg');
            imagedestroy($image);
        } else {
            echo 'yet';
        }
    }
}
