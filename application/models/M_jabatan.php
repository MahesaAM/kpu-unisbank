<?php
class M_jabatan extends CI_Model
{

    function get_all_master()
    {
        $h = $this->db->get('tbl_master_jabatan');
        return $h;
    }
    function get_all_sub()
    {
        $h = $this->db->get('tbl_sub_jabatan');
        return $h;
    }
    function get_unv()
    {
        $h = $this->db->get_where('tbl_master_jabatan', ['jabatan_type' => 'unv']);
        return $h;
    }
    function get_fak()
    {
        $h = $this->db->get_where('tbl_master_jabatan', ['jabatan_type' => 'fak']);
        return $h;
    }
    function tambah($j, $f)
    {
        $data = [
            'jabatan_nama' => $j,
            'jabatan_type' => 'fak',
            'jabatan_fak' => $f
        ];
        $this->db->insert('tbl_master_jabatan', $data);
    }
    function buat_master($nama, $type, $fak, $tahun)
    {
        $data = [
            'jabatan_nama' => $nama,
            'jabatan_type' => $type,
            'jabatan_fak' => $fak,
            'jabatan_periode' => $tahun
        ];
        $this->db->insert('tbl_jabatan', $data);
    }
    function buat_sub($id, $nama, $fak, $progdi, $tahun)
    {
        $data = [
            'sub_jabatan_id' => $id,
            'sub_nama' => $nama,
            'sub_fak' => $fak,
            'sub_prodi' => $progdi,
            'sub_tahun' => $tahun
        ];
        $this->db->insert('tbl_jabatan_sub', $data);
    }
    function edit($i, $j, $e)
    {
        $data = [
            'jabatan_nama' => $j,
            'jabatan_fak' => $e
        ];
        $this->db->update('tbl_master_jabatan', $data, ['jabatan_id' => $i]);
    }
    function hapus($i)
    {
        $this->db->delete('tbl_master_jabatan', ['jabatan_id' => $i]);
        $this->db->delete('tbl_sub_jabatan', ['jabatan_jabatan_id' => $i]);
    }
    function sub_jabatan($id)
    {
        $h = $this->db->get_where('tbl_sub_jabatan', ['jabatan_jabatan_id' => $id]);
        return $h;
    }
    function tambah_sub_jabatan($id, $jabatan, $progdi, $fak)
    {
        $data = [
            'jabatan_jabatan_id' => $id,
            'jabatan_nama' => $jabatan,
            'jabatan_fak' => $fak,
            'jabatan_prodi' => $progdi

        ];
        $this->db->insert('tbl_sub_jabatan', $data);
    }
    function del_sub($id)
    {
        $this->db->delete('tbl_sub_jabatan', ['jabatan_id' => $id]);
    }
}
