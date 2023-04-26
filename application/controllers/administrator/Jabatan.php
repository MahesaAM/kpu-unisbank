<?php
class Jabatan extends CI_Controller
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
        $this->load->model('M_jabatan');
    }

    function index()
    {
        $y['title'] = "Jabatan";
        $x['unv'] = $this->M_jabatan->get_unv()->result_array();
        $x['fak'] = $this->M_jabatan->get_fak()->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_master_jabatan', $x);
        $this->load->view('admin/template/V_footer');
    }
    function tambah()
    {
        $jabatan = $this->input->post('jabatan');
        $fak = $this->input->post('fak');

        $this->M_jabatan->tambah(strtoupper($jabatan), strtoupper($fak));
        redirect('administrator/Jabatan');
    }
    function edit()
    {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $fak = $this->input->post('fak');
        $this->M_jabatan->edit($id, strtoupper($jabatan), strtoupper($fak));
        redirect('administrator/Jabatan');
    }
    function hapus()
    {
        $id = $this->input->post('id');

        $this->M_jabatan->hapus($id);
        redirect('administrator/Jabatan');
    }
    function tambah_sub_jabatan()
    {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $progdi = $this->input->post('progdi');
        $fak = $this->input->post('fak');
        $this->M_jabatan->tambah_sub_jabatan($id, strtoupper($jabatan), strtoupper($progdi), $fak);
        $id_sub = $this->db->insert_id();
        $html = '<tr id="r' . $id_sub . '"><td>' . strtoupper($jabatan) . '</td><td>' . strtoupper($progdi) . '</td><td><button id-j="' . $id_sub . '" class="btn btn-danger del-list"><i class="fa fa-trash"></i></button></td></tr>';
        $data = ['berhasil', $html];
        echo json_encode($data);
    }
    function sub_jabatan()
    {
        $id = $this->input->post('id');
        $sub_jabatan = $this->M_jabatan->sub_jabatan($id)->result_array();
        $html = '';
        foreach ($sub_jabatan as $s) {
            $html .= '<tr id="r' . $s['jabatan_id'] . '"><td>' . $s['jabatan_nama'] . '</td><td>' . $s['jabatan_prodi'] . '</td><td><button id-j="' . $s['jabatan_id'] . '" class="btn btn-danger del-list"><i class="fa fa-trash"></i></button></td></tr>';
        }
        echo $html;
    }
    function del_sub()
    {
        $id = $this->input->post('id');
        $this->M_jabatan->del_sub($id);
    }
}
