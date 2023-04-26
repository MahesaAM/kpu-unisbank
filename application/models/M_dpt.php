<?php
class M_dpt extends CI_Model
{

    function get_dpt()
    {
        return $this->db->get('tbl_dpt');
    }
    function login($nim, $password)
    {
        return $this->db->get_where('tbl_dpt', ['dpt_nim' => $nim, 'dpt_password' => $password]);
    }
    function get_unv($t)
    {
        $h = $this->db->get_where('tbl_jabatan', ['jabatan_type' => 'unv', 'jabatan_periode' => $t]);
        return $h;
    }
    function get_fak($t, $f)
    {
        $h = $this->db->get_where('tbl_jabatan', ['jabatan_type' => 'fak', 'jabatan_periode' => $t, 'jabatan_fak' => $f]);
        return $h;
    }
    function get_hmps($t, $f, $p)
    {
        $h = $this->db->get_where('tbl_jabatan_sub', ['sub_tahun' => $t, 'sub_fak' => $f, 'sub_prodi' => $p]);
        return $h;
    }
    function tambah_dpt($nim, $nama, $hp, $email, $fakultas, $progdi, $password)
    {
        $data = [
            'dpt_nama' => $nama,
            'dpt_nim' => $nim,
            'dpt_hp' => $hp,
            'dpt_email' => $email,
            'dpt_fakultas' => $fakultas,
            'dpt_progdi' => $progdi,
            'dpt_password' => $password
        ];
        $this->db->insert('tbl_dpt', $data);
    }
    function edit_dpt($id, $nim, $nama, $hp, $email, $fakultas, $progdi)
    {
        $data = [
            'dpt_nama' => $nama,
            'dpt_nim' => $nim,
            'dpt_hp' => $hp,
            'dpt_email' => $email,
            'dpt_fakultas' => $fakultas,
            'dpt_progdi' => $progdi
        ];
        $this->db->update('tbl_dpt', $data, ['dpt_id' => $id]);
    }
    function get_all_tahun()
    {
        $this->db->select_max('tahun_tahun');
        $this->db->select('tahun_mulai');
        $this->db->select('tahun_akhir');
        $this->db->select('tahun_sertif');
        return $this->db->get('tbl_tahun');
    }
    function get_tahun($t)
    {
        return $this->db->get_where('tbl_tahun', ['tahun_tahun' => $t]);
    }
    function get_calon($id)
    {
        return $this->db->get_where('tbl_calon', ['calon_id' => $id]);
    }
    function voted($id_calon, $id_jabatan, $type, $nim, $tanggal, $tahun)
    {
        $data = [
            'voted_dpt_nim' => $nim,
            'voted_jabatan_id' => $id_jabatan,
            'voted_calon_id' => $id_calon,
            'voted_type' => $type,
            'voted_tanggal' => $tanggal,
            'voted_tahun' => $tahun
        ];
        $this->db->insert('tbl_voted', $data);
    }
    function get_voted($nim, $tahun)
    {
        return $this->db->get_where('tbl_voted', ['voted_dpt_nim' => $nim, 'voted_tahun' => $tahun]);
    }
}
