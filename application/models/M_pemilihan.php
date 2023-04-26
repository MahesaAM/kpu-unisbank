<?php
class M_pemilihan extends CI_Model
{

    function get_all_tahun()
    {
        $this->db->order_by('tahun_tahun', 'DESC');
        return $this->db->get('tbl_tahun')->result_array();
    }
    function get_tahun($t)
    {
        return $this->db->get_where('tbl_tahun', ['tahun_tahun' => $t]);
    }
    function buat($tahun, $mulai, $akhir)
    {
        $data = [
            'tahun_mulai' => $mulai,
            'tahun_akhir' => $akhir,
            'tahun_tahun' => $tahun,
            'tahun_sertif' => NULL,
            'tahun_sertif_ukuran' => 25,
            'tahun_sertif_warna' => '#000000',
            'tahun_sertif_vertical' => 0,
            'tahun_sertif_horizontal' => 0
        ];
        $this->db->insert('tbl_tahun', $data);
    }
    function edit($id, $tahun, $mulai, $akhir)
    {
        $data = [
            'tahun_mulai' => $mulai,
            'tahun_akhir' => $akhir,
            'tahun_tahun' => $tahun
        ];
        $this->db->update('tbl_tahun', $data, ['tahun_id' => $id]);
    }

    function hapus($id, $t)
    {
        $this->db->delete('tbl_tahun', ['tahun_tahun' => $t]);
        $this->db->delete('tbl_jabatan', ['jabatan_periode' => $t]);
        $this->db->delete('tbl_jabatan_sub', ['sub_tahun' => $t]);
        $this->db->delete('tbl_kandidat', ['kandidat_tahun' => $t]);
    }
    function get_unv($t)
    {
        $h = $this->db->get_where('tbl_jabatan', ['jabatan_type' => 'unv', 'jabatan_periode' => $t]);
        return $h;
    }
    function get_fak($t)
    {
        $h = $this->db->get_where('tbl_jabatan', ['jabatan_type' => 'fak', 'jabatan_periode' => $t]);
        return $h;
    }
    function tambah_calon($id_jabatan, $poster, $visi, $misi, $type)
    {
        $data = [
            'calon_jabatan_id' => $id_jabatan,
            'calon_poster' => $poster,
            'calon_visi' => $visi,
            'calon_misi' => $misi,
            'calon_type' => $type,
        ];
        $this->db->insert('tbl_calon', $data);
    }
    function edit_calon($id_calon, $id_jabatan, $poster, $visi, $misi)
    {
        $data = [
            'calon_jabatan_id' => $id_jabatan,
            'calon_poster' => $poster,
            'calon_visi' => $visi,
            'calon_misi' => $misi
        ];
        $this->db->update('tbl_calon', $data, ['calon_id' => $id_calon]);
    }
    function tambah_kandidat($nama, $sebagai, $nim, $fakultas, $progdi, $id, $tahun)
    {
        $data = [
            'kandidat_nama' => $nama,
            'kandidat_sebagai' => $sebagai,
            'kandidat_nim' => $nim,
            'kandidat_fakultas' => $fakultas,
            'kandidat_progdi' => $progdi,
            'kandidat_calon_id' => $id,
            'kandidat_tahun' => $tahun
        ];
        $this->db->insert('tbl_kandidat', $data);
    }
    function get_calon($id, $type)
    {
        return $this->db->get_where('tbl_calon', ['calon_jabatan_id' => $id, 'calon_type' => $type]);
    }
    function update_sertif($tahun, $template)
    {
        $data = [
            'tahun_sertif' => $template
        ];
        $this->db->update('tbl_tahun', $data, ['tahun_tahun' => $tahun]);
    }
}
