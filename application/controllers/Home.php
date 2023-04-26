<?php
class Home extends CI_Controller
{
    function index()
    {
        $this->load->view('V_home');
    }
    function berita($id)
    {
        $this->db->order_by('berita_tanggal', 'DSC');
        $x['b'] = $this->db->get_where('tbl_berita', ['berita_id' =>  $id])->row_array();
        $this->load->view('V_berita', $x);
    }
    function dpt()
    {
        $this->load->view('V_dpt');
    }
    function check_dpt()
    {
        $this->db->select('dpt_nama');
        $this->db->select('dpt_fakultas');
        $this->db->select('dpt_progdi');
        $this->db->like('dpt_nama', $_POST['input']);
        $dpt = $this->db->get('tbl_dpt')->result_array();
        $html = '<table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <th>Fakultas</th>
                                <th>Progdi</th>
                            </tr>';
        foreach ($dpt as $d) {
            $html .= '<tr>
                                    <td>' . $d['dpt_nama'] . '</td>
                                    <td>' . $d['dpt_fakultas'] . '</td>
                                    <td>' . $d['dpt_progdi'] . '</td>
                                </tr>';
        }
        $html .= '</table>';
        echo $html;
    }
    function all_berita()
    {
		$this->db->order_by('berita_id', 'DESC');
        $berita = $this->db->get('tbl_berita')->result_array();
        $html = '';
        foreach ($berita as $b) {
            $html .= '<div class="col-sm-6 col-md-4">
            <a style="color:black;" href="' . base_url('Home/berita/') . $b['berita_id'] . '">
<div style="cursor:pointer;" class="thumbnail">
  <img style="width:100%;" src="cover/' . $b['berita_cover'] . '" alt="...">
  <div class="caption">
    <b>' . $b['berita_judul'] . '</b>
    <p>' . $b['berita_tanggal'] . '</p>
  </div>
</div>
</a>
</div>';
        }
        echo $html;
    }
    function calon()
    {
        $this->db->select_max('tahun_tahun', 'tahun');
        $t = $this->db->get('tbl_tahun')->row_array();
        $x['tahun'] = $t['tahun'];
        $x['unv'] = $this->db->get_where('tbl_jabatan', ['jabatan_periode' => $t['tahun'], 'jabatan_type' => 'unv'])->result_array();
        $x['fak'] = $this->db->get_where('tbl_jabatan', ['jabatan_periode' => $t['tahun'], 'jabatan_type' => 'fak'])->result_array();
        $this->load->view('V_calon', $x);
    }
    function get_calon()
    {
        $id = $this->input->post('id');
        $c = $this->db->get_where('tbl_calon', ['calon_id' => $id])->row_array();
        $html = '<div class="row">
        <div class="col-md-12"><img style="width:100%;" class="m-b mx-auto" src="' . base_url('poster/' . $c['calon_poster']) . '"></div>';
        $kandidat = $this->db->get_where('tbl_kandidat', ['kandidat_calon_id' => $c['calon_id']])->result_array();
        $html .= '
        </div>
        <br>
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
        
        </div>';
        echo $html;
    }
}
