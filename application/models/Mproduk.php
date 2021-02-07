<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduk extends CI_Model {

    // --------------------- Model untuk admin ---------------------
    function filter_kategori($url_kategori)
    {
        $this->db->order_by('id_produk', 'desc');
        $this->db->join('produk', 'kategori_catering.id_kategori_catering = produk.id_kategori_catering', 'left');
        $this->db->where('url_kategori', $url_kategori);
        $ambil = $this->db->get('kategori_catering');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_produk', $value['id_produk']);
            $ambil1 = $this->db->get('foto_produk');
            $data1 = $ambil1->result_array();
            $value['foto'] = $data1;            
            $semua[] = $value;
        }

        return $semua;
    }

    function ambil_produk_kategori($url_kategori)
    {
        $this->db->join('kategori_catering', 'produk.id_kategori_catering = kategori_catering.id_kategori_catering', 'left');
        $this->db->where('url_kategori', $url_kategori);
        $ambil = $this->db->get('produk');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_produk', $value['id_produk']);
            $ambil1 = $this->db->get('foto_produk');
            $data1 = $ambil1->result_array();
            $value['foto'] = $data1;            
            $semua[] = $value;
        }

        return $semua;
    }

    function detail_produk($url_produk)
    {
        $this->db->join('produk', 'foto_produk.id_produk = produk.id_produk', 'left');
        $this->db->where('url_produk', $url_produk);
        $ambil = $this->db->get('foto_produk');
        $data = $ambil->result_array();

        return $data;
    }

    function menu_detail($url_produk)
    {
        $this->db->join('kategori_catering', 'produk.id_kategori_catering = kategori_catering.id_kategori_catering', 'left');
        $this->db->where('url_produk', $url_produk);
        $ambil = $this->db->get('produk');
        $data = $ambil->row_array();

        return $data;
    }

    function filter($id_kategori_catering)
    {
        $this->db->order_by('id_produk', 'desc');
        $this->db->join('kategori_catering', 'produk.id_kategori_catering = kategori_catering.id_kategori_catering', 'left');
        $this->db->where('kategori_catering.id_kategori_catering', $id_kategori_catering);
        $ambil = $this->db->get('produk');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_produk', $value['id_produk']);
            $ambil1 = $this->db->get('foto_produk');
            $data1 = $ambil1->result_array();
            $value['foto'] = $data1;            
            $semua[] = $value;
        }

        return $semua;
    }

    function tampil_kategori_land()
    {
        $this->db->order_by('id_kategori_catering', 'DESC');
        $ambil = $this->db->get('kategori_catering');
        $data = $ambil->result_array();
        return $data;
    }

    function tampil($url_kategori='')
    {
        $this->db->order_by('id_produk', 'desc');
        $this->db->join('kategori_catering', 'produk.id_kategori_catering = kategori_catering.id_kategori_catering', 'left');

        if (!empty($url_kategori)) {
            $this->db->where('url_kategori', $url_kategori);
        }

        $ambil = $this->db->get('produk');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_produk', $value['id_produk']);
            $ambil1 = $this->db->get('foto_produk');
            $data1 = $ambil1->result_array();
            $value['foto'] = $data1;            
            $semua[] = $value;
        }

        return $semua;
    }

    function tampil_land()
    {
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(6, 0);
        $this->db->join('produk', 'kategori_catering.id_kategori_catering = produk.id_kategori_catering', 'left');
        $this->db->where('featured', 'ya');
        $ambil = $this->db->get('kategori_catering');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_produk', $value['id_produk']);
            $ambil1 = $this->db->get('foto_produk');
            $data1 = $ambil1->result_array();
            $value['foto'] = $data1;            
            $semua[] = $value;
        }

        return $semua;
    }

    function tambah($inputan) 
    {
        $number_of_files = sizeof($_FILES['produk']['tmp_name']);
        $files = $_FILES['produk'];
        $config=array(
            'upload_path'    => './assets/img/produk/',
            'allowed_types'  => 'gif|jpg|png',
            'max_size'       => 2048,
            'width'          => 479,
            'height'         => 479
            );

        if ($number_of_files>0) 
        {
            if (!empty($inputan['featured'])) {   
                $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->insert('produk',$inputan);
            }
            else{
                $inputan['featured']  = "tidak";
                $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->insert('produk',$inputan);
            }

            $inputan1['id_produk'] = $this->db->insert_id('produk');

            for ($i = 0;$i < $number_of_files; $i++)
            {      
                if ($_FILES['produk']['error'][$i] == '0') {

                    $_FILES['produk']['name'] = $files['name'][$i];  
                    $_FILES['produk']['type'] = $files['type'][$i];  
                    $_FILES['produk']['tmp_name'] = $files['tmp_name'][$i];  
                    $_FILES['produk']['error'] = $files['error'][$i];  
                    $_FILES['produk']['size'] = $files['size'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('produk');

                    $data_upload = $this->upload->data();

                    $nama_file = $data_upload['file_name'];

                    $inputan1['nama_produk'] = $nama_file;
                    $this->db->insert('foto_produk',$inputan1);
                } else {

                    $inputan1['nama_produk'] = 'default.png';
                    $this->db->insert('foto_produk',$inputan1);
                }


            }

        }
        elseif ($number_of_files=0) {
            $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
            $this->db->insert('produk',$inputan);
        }

    }

    function ubah($inputan,$id_produk) 
    {
        $ambil = $this->ambil_foto_produk($id_produk);

        $number_of_files = sizeof($_FILES['produk']['tmp_name']);
        $files = $_FILES['produk'];
        $config = array(
            'upload_path'    => './assets/img/produk/',
            'allowed_types'  => 'gif|jpg|png',
            'max_size'       => 2048,
            'width'          => 479,
            'height'         => 479
            );

        if ($number_of_files>0) 
        {

            foreach ($ambil as $key => $value) {

                $nama_produk = array($value['nama_produk']);
            }

            for($i = 0;$i < $number_of_files; $i++){

                if ($_FILES['produk']['error'][$i] == '0') {

                    $_FILES['produk']['name'] = $files['name'][$i];  
                    $_FILES['produk']['type'] = $files['type'][$i];  
                    $_FILES['produk']['tmp_name'] = $files['tmp_name'][$i];  
                    $_FILES['produk']['error'] = $files['error'][$i];  
                    $_FILES['produk']['size'] = $files['size'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('produk');

                    $data_upload = $this->upload->data();

                    $nama_file = $data_upload['file_name'];

                    $id_foto_produk = $inputan['id_foto_produk'][$i];

                    $this->db->where('id_foto_produk', $id_foto_produk);
                    $this->db->update('foto_produk', array('nama_produk'=>$nama_file));
                }

            } 

            unset($inputan['id_foto_produk']);

            if (!empty($inputan['featured'])) {   
                $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk',$inputan);
            }
            else{
                $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
                $inputan['featured']  = "tidak";
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk',$inputan);
            }


        }

        elseif ($number_of_files=0) {
            if (!empty($inputan['featured'])) {   
                $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk',$inputan);
            }
            else{
                $inputan['featured']  = "tidak";
                $inputan['url_produk']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk',$inputan);
            }
        }

    }

    function ambil_foto_perproduk($id_foto_produk) 
    {
        $this->db->where('id_foto_produk', $id_foto_produk);
        $ambil = $this->db->get('foto_produk');
        $data = $ambil->row_array();

        return $data;
    }

    function ambil_produk($id_produk) 
    {
        $this->db->join('kategori_catering', 'produk.id_kategori_catering = kategori_catering.id_kategori_catering', 'left');
        $this->db->where('id_produk', $id_produk);
        $ambil = $this->db->get('produk');
        $data = $ambil->row_array();

        return $data;
    }

    function ambil_foto_produk($id_produk) 
    {
        $this->db->where('id_produk', $id_produk);
        $ambil = $this->db->get('foto_produk');
        $data = $ambil->result_array();

        return $data;
    }

    function hapus($id_produk) 
    {
        $this->db->where('id_produk', $id_produk);
        $ambil = $this->db->get('foto_produk');
        $data = $ambil->result_array();

        if (empty($data)) {
            $this->db->where('id_produk', $id_produk);
            $this->db->delete('produk');
        }
        else
        {
            $this->db->where('id_produk', $id_produk);
            $this->db->delete('produk');

            foreach ($data as $key => $value) 
            {
             $foto = $value['nama_produk'];

               // apakah ada file foto trsbt dlm folder
             if (file_exists("./assets/img/produk/$foto") && $foto == 'default.png') {
                unlink("./assets/img/produk/$foto");
            }

            $this->db->where('id_produk', $id_produk);
            $this->db->delete('foto_produk'); 
        }
    }

}

}
?>