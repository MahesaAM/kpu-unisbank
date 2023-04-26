<?php

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }

    function index()
    {
        $admin = $this->session->userdata('admin_username');
        if (isset($admin)) {
            $username = $this->session->userdata('admin_username');
            $c = $this->db->get_where('tbl_admin', ['admin_username' => $username])->row_array();
            if (!empty($c)) {
                redirect('administrator/Pemilihan');
                die();
            } else {
                redirect('Admin');
            }
        } else {
            $this->load->view('V_admin');
        }
    }
    function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $c = $this->M_admin->login($username, $password)->row_array();
        if ($c) {
            $data = [
                'admin_nama' => $c['admin_nama'],
                'admin_username' => $c['admin_username']
            ];
            $this->session->set_userdata($data);
            echo 'success';
        } else {
            echo 'no';
        }
    }
    function logout()
    {
        session_destroy();
        redirect('Admin');
    }
}
