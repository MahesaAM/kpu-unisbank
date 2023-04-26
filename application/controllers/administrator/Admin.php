<?php
class Admin extends CI_Controller
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
        $this->load->model('M_admin');
    }

    function index()
    {
        $y['title'] = "Admin";
        $x['admin'] = $this->M_admin->get_admin()->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_admin', $x);
        $this->load->view('admin/template/V_footer');
    }
    function tambah_admin()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->M_admin->tambah_admin($nama, $username, $password);
    }
    function edit_admin()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->M_admin->edit_admin($id, $nama, $username, $password);
    }
    function hapus_admin()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_admin', ['admin_id' => $id]);
    }
}
