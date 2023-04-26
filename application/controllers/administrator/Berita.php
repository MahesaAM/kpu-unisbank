<?php
class Berita extends CI_Controller
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
        $this->load->model('M_berita');
    }

    function index()
    {
        $y['title'] = "Berita";
        $x['berita'] = $this->M_berita->get_all()->result_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_berita_list', $x);
        $this->load->view('admin/template/V_footer');
    }

    function tambah()
    {
        $y['title'] = "Buat Berita";
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_berita_buat');
        $this->load->view('admin/template/V_footer');
    }

    function edit($id)
    {
        $y['title'] = "Buat Berita";
        $x['id'] = $id;
        $x['b'] = $this->db->get_where('tbl_berita', ['berita_id' => $id])->row_array();
        $this->load->view('admin/template/V_header', $y);
        $this->load->view('admin/V_berita_edit', $x);
        $this->load->view('admin/template/V_footer');
    }

    function publish()
    {
        $cover = time() . $_FILES['cover']['name'];
        $config['upload_path']          = './cover/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['remove_spaces']        = FALSE;
        $config['file_name'] = $cover;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('cover')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $input = [
            'berita_judul' => $_POST['judul'],
            'berita_isi' => $_POST['isi'],
            'berita_tanggal' => date('Y-m-d'),
            'berita_cover' => $cover
        ];
        $this->db->insert('tbl_berita', $input);
    }

    function proces_edit()
    {
        $id = $this->input->post('id');
        $cover = time() . $_FILES['cover']['name'];
        if (!empty($cover)) {
            $b = $this->db->get_where('tbl_berita', ['berita_id' => $id])->row_array();
            unlink('./cover/' . $b['berita_cover']);
            $config['upload_path']          = './cover/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['remove_spaces']        = FALSE;
            $config['file_name'] = $cover;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('cover')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $input = [
                'berita_judul' => $_POST['judul'],
                'berita_isi' => $_POST['isi'],
                'berita_tanggal' => date('Y-m-d'),
                'berita_cover' => $_FILES['cover']['name']
            ];
            $this->db->update('tbl_berita', $input, ['berita_id' => $id]);
        } else {
            $input = [
                'berita_judul' => $_POST['judul'],
                'berita_isi' => $_POST['isi'],
                'berita_tanggal' => date('Y-m-d')
            ];
            $this->db->update('tbl_berita', $input, ['berita_id' => $id]);
        }
    }

    function hapus()
    {
        unlink('./cover/' . $_POST['cover']);
        $this->db->delete('tbl_berita', ['berita_id' => $_POST['id']]);
    }
}
