<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dpt');
    }

    function index()
    {
        $dpt = $this->session->userdata('dpt_nim');
        if (isset($dpt)) {
            $nim = $this->session->userdata('dpt_nim');
            $c = $this->db->get_where('tbl_dpt', ['dpt_nim' => $nim])->row_array();
            if (!empty($c)) {
                redirect('dpt/Pemilihan');
                die();
            } else {
                redirect('Auth');
            }
        } else {
            $this->load->view('V_auth');
        }
    }
    function login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');
        $c = $this->M_dpt->login($nim, $password)->row_array();
        if ($c) {
            $data = [
                'dpt_nama' => $c['dpt_nama'],
                'dpt_nim' => $c['dpt_nim'],
                'dpt_fakultas' => $c['dpt_fakultas'],
                'dpt_progdi' => $c['dpt_progdi']
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
        redirect('Auth');
    }
}
