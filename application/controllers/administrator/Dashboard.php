<?php
class Dashboard extends CI_Controller
{

    public function index()
    {
        $x['title'] = "Dashboard";
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_dashboard');
        $this->load->view('admin/template/V_footer');
    }
}
