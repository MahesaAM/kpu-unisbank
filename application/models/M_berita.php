<?php
class M_berita extends CI_Model
{

    function get_all()
    {
        return $this->db->get('tbl_berita');
    }
}
