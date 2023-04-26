<?php
class M_admin extends CI_Model
{

    function login($u, $p)
    {
        $h = $this->db->query("SELECT * FROM tbl_admin WHERE admin_username = '$u' AND admin_password = '$p'");
        return $h;
    }
    function get_admin()
    {
        return $this->db->get('tbl_admin');
    }
    function tambah_admin($nama, $username, $password)
    {
        $data = [
            'admin_nama' => $nama,
            'admin_username' => $username,
            'admin_password' => $password
        ];
        $this->db->insert('tbl_admin', $data);
    }
    function edit_admin($id, $nama, $username, $p)
    {
        if (empty($p)) {
            $data = [
                'admin_nama' => $nama,
                'admin_username' => $username
            ];
        } else {
            $data = [
                'admin_nama' => $nama,
                'admin_username' => $username,
                'admin_password' => $p
            ];
        }
        $this->db->update('tbl_admin', $data, ['admin_id' => $id]);
    }
}
