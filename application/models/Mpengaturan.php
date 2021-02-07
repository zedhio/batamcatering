<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengaturan extends CI_Model {

    // --------------------- Model untuk admin ---------------------
    function tambah_saran($inputan)
    {
        $this->db->insert('saran_pertanyaan',$inputan);
    }

    function ambil_config($id_pengaturan) 
    {
        $this->db->where('id_pengaturan', $id_pengaturan);
        $ambil = $this->db->get('pengaturan');
        $data = $ambil->row_array();
        return $data;
    }    

    function ubah_meta($inputan,$id_pengaturan) 
    {
        $this->db->where('id_pengaturan', $id_pengaturan);
        $this->db->update('pengaturan', $inputan);
    }

    function ubah_sosmed($inputan,$id_pengaturan) 
    {
        $this->db->where('id_pengaturan', $id_pengaturan);
        $this->db->update('pengaturan', $inputan);
    }

    function ubah_kontak($inputan,$id_pengaturan) 
    {
        $this->db->where('id_pengaturan', $id_pengaturan);
        $this->db->update('pengaturan', $inputan);
    }

    function ubah_lainnya($inputan,$id_pengaturan) 
    {
        $this->db->where('id_pengaturan', $id_pengaturan);
        $this->db->update('pengaturan', $inputan);
    }

}
?>