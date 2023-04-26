<?php
class Dpt extends CI_Controller
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
        $this->load->model('M_dpt');
    }

    function index()
    {
        $y['title'] = "DPT";
        // $x['dpt'] = $this->M_dpt->get_dpt()->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_dpt');
        $this->load->view('admin/template/V_footer');
    }
    function get_dpt()
    {
        $key = $this->input->post('key');
        $this->db->like('dpt_nim', $key);
        $this->db->or_like('dpt_nama', $key);
        $dpt = $this->db->get('tbl_dpt')->result_array();
        $html = '';
        $no = 1;
        foreach ($dpt as $d) {
            $html .= '<tr id="r' . $d['dpt_id'] . '">
            <td>' . $no++ . '</td>
            <td>' . $d['dpt_nim'] . '</td>
            <td>' . $d['dpt_nama'] . '</td>
            <td>' . $d['dpt_fakultas'] . '</td>
            <td>' . $d['dpt_progdi'] . '</td>
            <td>' . $d['dpt_password'] . '</td>
            <td>
                <a style="color: white;" data-toggle="modal" data-target="#edit" class="btn btn-primary edit" dpt_id ="' . $d['dpt_id'] . '" nim ="' . $d['dpt_nim'] . '" nama="' . $d['dpt_nama'] . '" hp="' . $d['dpt_hp'] . '" email="' . $d['dpt_email'] . '" fakultas="' . $d['dpt_fakultas'] . '" progdi="' . $d['dpt_progdi'] . '"><i class="fa fa-pencil"></i></a>
                <a style="color: white;" data-toggle="modal" data-target="#hapus" class="btn btn-danger delete" dpt_id="' . $d['dpt_id'] . '"><i class="fa fa-trash"></i></a>
            </td>
            </tr>';
        }
        echo $html;
    }
    function tambah_dpt()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $fakultas = $this->input->post('fakultas');
        $progdi = $this->input->post('progdi');
        // $nim = str_replace('.', ' ', $nim1);
        // $nim = preg_split('/\s+/', $nim);
        // $angkatan =  $nim[0];
        // $fakultas = $nim[1];
        // $progdi = $nim[2];
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        do {
            for ($i = 0; $i < 5; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $chk = $this->db->get_where('tbl_dpt', ['dpt_password' => $randomString])->num_rows();
        } while ($chk > 0);
        $this->M_dpt->tambah_dpt($nim, $nama, $hp, $email, strtoupper($fakultas), strtoupper($progdi), $randomString);
    }
    function check_nim()
    {
        $val = $this->input->post('val');
        $chk = $this->db->get_where('tbl_dpt', ['dpt_nim' => $val])->row_array();
        if ($chk) {
            $data = ['1', $chk['dpt_nim']];
            echo json_encode($data);
        } else {
            $data = ['0'];
            echo json_encode($data);
        }
    }
    function edit_dpt()
    {
        $id = $this->input->post('id');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $fakultas = $this->input->post('fakultas');
        $progdi = $this->input->post('progdi');
        // $nim = str_replace('.', ' ', $nim1);
        // $nim = preg_split('/\s+/', $nim);
        // $angkatan =  $nim[0];
        // $fakultas = $nim[1];
        // $progdi = $nim[2];
        $this->M_dpt->edit_dpt($id, $nim, $nama, $hp, $email, strtoupper($fakultas), strtoupper($progdi));
    }
    function hapus_dpt()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_dpt', ['dpt_id' => $id]);
    }
    function broadcast()
    {
        $dpt = $this->db->get('tbl_dpt')->result_array();
        echo json_encode($dpt);
    }
}
