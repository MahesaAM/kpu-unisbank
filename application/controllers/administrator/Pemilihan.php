<?php
class Pemilihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $username = $this->session->userdata('admin_username');
        $c = $this->db->get_where('tbl_admin', ['admin_username' => $username])->row_array();
        if (empty($c)) {
            redirect('Admin');
            die();
        }
        $this->load->model('M_pemilihan');
        $this->load->model('M_jabatan');
    }

    function index()
    {
        $x['title'] = "Pemilihan";
        $x['tahun'] = $this->M_pemilihan->get_all_tahun();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_pemilihan');
        $this->load->view('admin/template/V_footer');
    }
    function buat()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tahun = date('Y', strtotime($mulai));
        $chk = $this->db->get_where('tbl_tahun', ['tahun_tahun' => $tahun])->num_rows();
        if ($chk > 0) {
            echo '1';
        } else {
            $this->M_pemilihan->buat($tahun, $mulai, $akhir);
            $master = $this->M_jabatan->get_all_master()->result_array();
            foreach ($master as $j) {
                $this->M_jabatan->buat_master($j['jabatan_nama'], $j['jabatan_type'], $j['jabatan_fak'], $tahun);
                $id = $this->db->insert_id();
                $sub = $this->db->get_where('tbl_sub_jabatan', ['jabatan_jabatan_id' => $j['jabatan_id']])->result_array();
                foreach ($sub as $s) {
                    $this->M_jabatan->buat_sub($id, $s['jabatan_nama'], $s['jabatan_fak'], $s['jabatan_prodi'], $tahun);
                }
            }
            $data = ['success', $tahun];
            echo json_encode($data);
        }
    }
    function edit()
    {
        $id = $this->input->post('id');
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');
        $tahun = date('Y', strtotime($mulai));
        $this->M_pemilihan->edit($id, $tahun, $mulai, $akhir);
        $data = ['success', $tahun];
        echo json_encode($data);
    }
    function hapus()
    {
        $t = $this->input->post('t');
        $id = $this->input->post('id');
        $this->M_pemilihan->hapus($id, $t);
    }
    function jabatan($p)
    {
        $y['title'] = "Jabatan";
        $x['unv'] = $this->M_pemilihan->get_unv($p)->result_array();
        $x['fak'] = $this->M_pemilihan->get_fak($p)->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_jabatan', $x);
        $this->load->view('admin/template/V_footer');
    }
    function calon($t, $id)
    {
        $y['title'] = "Calon";
        $type = $this->uri->segment(6);
        $x['calon'] = $this->M_pemilihan->get_calon($id, $type)->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_calon', $x);
        $this->load->view('admin/template/V_footer');
    }
    function tambah_calon()
    {
        $tahun = $this->input->post('tahun');
        $type = $this->input->post('type');
        $id_jabatan = $this->input->post('id_jabatan');
        $poster = time() . $_FILES['poster']['name'];
        $config['upload_path']          = './poster/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['remove_spaces']        = FALSE;
        $config['file_name'] = $poster;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('poster')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $this->M_pemilihan->tambah_calon($id_jabatan, $poster, $visi, $misi, $type);
        $id = $this->db->insert_id();
        if (isset($_POST['nomor'])) {
            foreach ($_POST['nomor'] as $i) {
                $nama = $_POST['nama_' . $i];
                $sebagai = $_POST['sebagai_' . $i];
                $nim = $_POST['nim_' . $i];
                $fakultas = $_POST['fakultas_' . $i];
                $progdi = $_POST['progdi_' . $i];
                $this->M_pemilihan->tambah_kandidat($nama, $sebagai, $nim, $fakultas, $progdi, $id, $tahun);
            }
        }
        redirect('administrator/Pemilihan/calon/' . $tahun . '/' . $id_jabatan . '/' . $type);
    }
    function edit_calon()
    {
        $tahun = $this->input->post('tahun');
        $id_jabatan = $this->input->post('id_jabatan');
        $type = $this->input->post('type');
        $id_calon = $this->input->post('id_calon');
        $this->db->delete('tbl_kandidat', ['kandidat_calon_id' => $id_calon]);
        if (!empty($_FILES['poster']['name'])) {
            $poster = time() . $_FILES['poster']['name'];
            $config['upload_path']          = './poster/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['remove_spaces']        = FALSE;
            $config['file_name'] = $poster;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('poster')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
        } else {
            $poster = $this->input->post('poster_default');
        }
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $this->M_pemilihan->edit_calon($id_calon, $id_jabatan, $poster, $visi, $misi);
        if (isset($_POST['nama'])) {
            foreach ($_POST['nama'] as $k => $i) {
                $nama = $_POST['nama'][$k];
                $sebagai = $_POST['sebagai'][$k];
                $nim = $_POST['nim'][$k];
                $fakultas = $_POST['fakultas'][$k];
                $progdi = $_POST['progdi'][$k];
                $this->M_pemilihan->tambah_kandidat($nama, $sebagai, $nim, $fakultas, $progdi, $id_calon, $tahun);
            }
        }
        redirect('administrator/Pemilihan/calon/' . $tahun . '/' . $id_jabatan . '/' . $type);
    }
    function hapus_calon()
    {
        $id = $this->input->post('id');
        $poster = $this->input->post('poster');
        $type = $this->input->post('type');
        unlink('./poster/' . $poster);
        $id_jabatan = $this->input->post('id_jabatan');
        $tahun = $this->input->post('tahun');
        $this->db->delete('tbl_calon', ['calon_id' => $id]);
        $this->db->delete('tbl_kandidat', ['kandidat_calon_id' => $id]);
        redirect('administrator/Pemilihan/calon/' . $tahun . '/' . $id_jabatan . '/' . $type);
    }
    function del_kandidat()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_kandidat', ['kandidat_id' => $id]);
    }
    function sertif($t)
    {
        $y['title'] = "Sertifikat";
        $x['t'] = $this->M_pemilihan->get_tahun($t)->row_array();
        $x['tahun'] = $t;
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_sertif', $x);
        $this->load->view('admin/template/V_footer');
    }
    function update_sertif()
    {
        $sertif = $this->input->post('sertif');
        $tahun = $this->input->post('tahun');
        $s = $_FILES['sertif']['name'];
        if (!empty($s)) {
            $t = $this->db->get_where('tbl_tahun', ['tahun_tahun' => $tahun])->row_array();
            if ($t['tahun_sertif'] == NULL) {
                $allowed = array('jpeg', 'jpg');
                $filename = $_FILES['sertif']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (in_array($ext, $allowed)) {
                    $template = time() . $_FILES["sertif"]['name'];
                    $config['file_name'] = $template;
                    $config['upload_path']          = './sertif/';
                    $config['allowed_types']        = 'jpg|jpeg';
                    $config['max_size']             = 0;
                    $config['remove_spaces']        = FALSE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('sertif')) {
                        $this->upload->data();
                    }
                    $this->M_pemilihan->update_sertif($tahun, $template);
                    $font = "./arial.ttf";
                    $image = imagecreatefromjpeg("./sertif/" . $template);
                    $color = imagecolorallocate($image, 19, 21, 22);
                    $name = "NAMA PEMILIH";
                    imagettftext($image, 50, 0, 500, 700, $color, $font, $name);
                    imagejpeg($image, "demo_sertif/" . $template);
                    imagedestroy($image);
                }
            } else {
                $allowed = array('jpeg', 'jpg');
                $filename = $_FILES['sertif']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (in_array($ext, $allowed)) {
                    $template = time() . $_FILES["sertif"]['name'];
                    $config['file_name'] = $template;
                    $config['upload_path']          = './sertif/';
                    $config['allowed_types']        = 'jpg|jpeg';
                    $config['max_size']             = 0;
                    $config['remove_spaces']        = FALSE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('sertif')) {
                        $this->upload->data();
                    }
                    $this->M_pemilihan->update_sertif($tahun, $template);
                    $font = "./arial.ttf";
                    $image = imagecreatefromjpeg("./sertif/" . $template);
                    $color = imagecolorallocate($image, 19, 21, 22);
                    $name = "NAMA PEMILIH";
                    imagettftext($image, 50, 0, 500, 700, $color, $font, $name);
                    imagejpeg($image, "demo_sertif/" . $template);
                    imagedestroy($image);
                }
            }
        }

        redirect('administrator/Pemilihan/sertif/' . $tahun);
    }
    function design()
    {
        $ukuran = $this->input->post('ukuran');
        $vertical = $this->input->post('vertical');
        $horizontal = $this->input->post('horizontal');
        $color = $this->input->post('color');
        $tahun = $this->input->post('tahun');
        $data = [
            'tahun_sertif_ukuran' => $ukuran,
            'tahun_sertif_vertical' => $vertical,
            'tahun_sertif_horizontal' => $horizontal,
            'tahun_sertif_warna' => $color
        ];
        $this->db->update('tbl_tahun', $data, ['tahun_tahun' => $tahun]);
        $t = $this->db->get_where('tbl_tahun', ['tahun_tahun' => $tahun])->row_array();
        unlink('./demo_sertif/' . $t['tahun_sertif']);
        $font = "./arial.ttf";
        $image = imagecreatefromjpeg("./sertif/" . $t['tahun_sertif']);
        $color = imagecolorallocate($image, 0, 0, 0);
        $name = "NAMA PEMILIH";
        imagettftext($image, $ukuran, 0, $horizontal, $vertical, $color, $font, $name);
        imagejpeg($image, "demo_sertif/" . $t['tahun_sertif']);
        imagedestroy($image);
        echo base_url('demo_sertif/' . $t['tahun_sertif'] . '?buster=' . time());
    }
    function view_sertif()
    {
        $tahun = $this->input->post('tahun');
        $t = $this->db->get_where('tbl_tahun', ['tahun_tahun' => $tahun])->row_array();
        echo base_url('demo_sertif/' . $t['tahun_sertif'] . '?buster=' . time());
    }
    function statik($t)
    {
        $y['title'] = "Statik";
        $x['tahun'] = $t;
        $x['unv'] = $this->M_pemilihan->get_unv($t)->result_array();
        $x['fak'] = $this->M_pemilihan->get_fak($t)->result_array();
        $x['hmps'] = $this->db->get_where('tbl_jabatan_sub', ['sub_tahun' => $t])->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_statik', $x);
        $this->load->view('admin/template/V_footer');
    }
    function hasil()
    {
        $tahun = $_POST['tahun'];
        $unv = $this->M_pemilihan->get_unv($tahun)->result_array();
        $fak = $this->M_pemilihan->get_fak($tahun)->result_array();
        $hmps = $this->db->get_where('tbl_jabatan_sub', ['sub_tahun' => $tahun])->result_array();
        $this->db->group_by("voted_dpt_nim");
        $sudah = $this->db->get_where('tbl_voted', ['voted_tahun' => $tahun])->num_rows();
        $dpt = $this->db->get('tbl_dpt')->num_rows();
        $html = '
        <table class="table table-bordered">
        <tr>
        <td>Sudah Memilih</td>
        <td>' . number_format($sudah) . '</td>
        </tr>
        <tr>
        <td>Belum Memilih</td>
        <td>' . number_format($dpt - $sudah) . '</td>
        </tr>
        </table>
        ';

        foreach ($unv as $u) {
            $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $u['jabatan_id'], 'calon_type' => 'm'])->result_array();
            $html .= '<div class="row">
                <div class="col-md-6">
                <canvas class="chart" id="pieChart' . $u['jabatan_id'] . 'm" width="250" height="250"></canvas>
                </div>
                <div class="col-md-6">
                <b>' . $u['jabatan_nama'] . '</b>
                <ul class="jabatan' . $u['jabatan_id'] . 'm">';

            foreach ($calon as $c) {
                $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                $v = $this->db->get_where('tbl_voted', ['voted_calon_id' => $c['calon_id'], 'voted_tahun' => $tahun, 'voted_type' => 'm'])->num_rows();
                $rand = '#' . str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

                $html .= '<li class="calon' . $u['jabatan_id'] . 'm" data-votes="' . $v . ' " data-color="' . $rand . '">
                            <span style="background:  ' . $rand . ';"></span>
                            <b class="vote-percentage' . $u['jabatan_id'] . 'm"></b><b>% - ' . $v  . ' Suara</b> | ';

                foreach ($kandidat as $in => $k) {
                    $html .= $k['kandidat_nama'];
                    if ($in !== count($kandidat) - 1) {
                        $html .= ' - ';
                    }
                }

                $html .= '</li>';
            }
            $html .= '</ul>
            </div>
            </div>';
        }
        foreach ($fak as $f) {
            $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $f['jabatan_id'], 'calon_type' => 'm'])->result_array();
            $html .= '<div class="row">
                <div class="col-md-6">
                <canvas class="chart" id="pieChart' . $f['jabatan_id'] . 'm" width="250" height="250"></canvas>
                </div>
                <div class="col-md-6">
                <b>' . $f['jabatan_nama'] . '</b>
                <ul class="jabatan' . $f['jabatan_id'] . 'm">';

            foreach ($calon as $c) {
                $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                $v = $this->db->get_where('tbl_voted', ['voted_calon_id' => $c['calon_id'], 'voted_tahun' => $tahun, 'voted_type' => 'm'])->num_rows();
                $rand = '#' . str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

                $html .= '<li class="calon' . $f['jabatan_id'] . 'm" data-votes="' . $v . ' " data-color="' . $rand . '">
                            <span style="background:  ' . $rand . ';"></span>
                            <b class="vote-percentage' . $f['jabatan_id'] . 'm"></b><b> % - ' . $v  . ' Suara</b> | ';

                foreach ($kandidat as $in => $k) {
                    $html .= $k['kandidat_nama'];
                    if ($in !== count($kandidat) - 1) {
                        $html .= ' - ';
                    }
                }

                $html .= '</li>';
            }
            $html .= '</ul>
            </div>
            </div>';
        }
        foreach ($hmps as $h) {
            $calon = $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $h['sub_id'], 'calon_type' => 's'])->result_array();
            $html .= '<div class="row">
            <div class="col-md-6">
                <canvas class="chart" id="pieChart' . $h['sub_id'] . 's" width="250" height="250"></canvas>
                </div>
                <div class="col-md-6">
                <b>' . $h['sub_nama'] . '</b>
                <ul class="jabatan' . $h['sub_id'] . 's">';

            foreach ($calon as $c) {
                $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
                $v = $this->db->get_where('tbl_voted', ['voted_calon_id' => $c['calon_id'], 'voted_tahun' => $tahun, 'voted_type' => 's'])->num_rows();
                $rand = '#' . str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

                $html .= '<li class="calon' . $h['sub_id'] . 's" data-votes="' . $v . ' " data-color="' . $rand . '">
                            <span style="background:  ' . $rand . ';"></span>
                            <b class="vote-percentage' . $h['sub_id'] . 's"></b><b> % - ' . $v  . ' Suara</b> | ';

                foreach ($kandidat as $in => $k) {
                    $html .= $k['kandidat_nama'];
                    if ($in !== count($kandidat) - 1) {
                        $html .= ' - ';
                    }
                }

                $html .= '</li>';
            }
            $html .= '</ul>
            </div>
            </div>';
        }
        echo $html;
    }
    function check_hasil()
    {
        echo $this->db->get_where('tbl_voted', ['voted_tahun' => $_POST['tahun']])->num_rows();
    }
    function pemilih()
    {
        $x['title'] = "Pemilih";
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_pemilih');
        $this->load->view('admin/template/V_footer');
    }
    function get_pemilih()
    {
        $key = $this->input->post('key');
        $tahun = $this->input->post('tahun');
        $this->db->select('*');
        $this->db->from('tbl_voted');
        $this->db->join('tbl_dpt', 'tbl_dpt.dpt_nim = tbl_voted.voted_dpt_nim');
        $this->db->where('voted_tahun', $tahun);
        $this->db->like('dpt_nim', $key);
        $this->db->or_like('dpt_nama', $key);
        $dpt = $this->db->get()->result_array();
        $html = '';
        $no = 1;
        foreach ($dpt as $d) {
            $html .= '<tr>
            <td>' . $no++ . '</td>
            <td>' . $d['dpt_nim'] . '</td>
            <td>' . $d['dpt_nama'] . '</td>
            <td>' . $d['dpt_fakultas'] . '</td>
            <td>' . $d['dpt_progdi'] . '</td>
            </tr>';
        }
        echo $html;
    }
}
