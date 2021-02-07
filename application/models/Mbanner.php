<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbanner extends CI_Model {

    function tampil_saran() 
    {
        $this->db->order_by('id_saran_pertanyaan', 'DESC');
        $ambil = $this->db->get('saran_pertanyaan');
        $data = $ambil->result_array();
        return $data;
    }

    // --------------------- Banner ---------------------
    function tampil_banner() 
    {
        $this->db->order_by('id_banner', 'DESC');
        $ambil = $this->db->get('banner');
        $data = $ambil->result_array();
        return $data;
    }

    function ambil_banner($id_banner) 
    {
        foreach ($id_banner as $key => $value) {
            $this->db->where('id_banner', $value);
            $ambil = $this->db->get('banner');
            $data = $ambil->result_array();

            return $data;
        }
    }  

    function ubah_banner($inputan) 
    {
        $id_banner = $inputan['id_banner'];
        $banner = $this->ambil_banner($id_banner);

        $number_of_files = sizeof($_FILES['cover']['tmp_name']);
        $files = $_FILES['cover'];
        $config = array(
            'upload_path'    => './assets/img/banner/',
            'allowed_types'  => 'gif|jpg|png',
            'max_size'       => 2048,
            'width'          => 479,
            'height'         => 479
            );

        if ($number_of_files>0) 
        {

            foreach ($banner as $key => $value) {

                $nama_cover = array($value['cover']);
            }

            for($i = 0;$i < $number_of_files; $i++){

                if ($_FILES['cover']['error'][$i] == '0') {

                    $_FILES['cover']['name'] = $files['name'][$i];  
                    $_FILES['cover']['type'] = $files['type'][$i];  
                    $_FILES['cover']['tmp_name'] = $files['tmp_name'][$i];  
                    $_FILES['cover']['error'] = $files['error'][$i];  
                    $_FILES['cover']['size'] = $files['size'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('cover');

                    $data_upload = $this->upload->data();

                    $nama_banner = $data_upload['file_name'];

                    $id_banner = $inputan['id_banner'][$i];

                    $this->db->where('id_banner', $id_banner);
                    $this->db->update('banner', array('cover'=>$nama_banner));
                }

            } 

        }

    }
    // --------------------- Banner ---------------------

    // --------------------- Kategori Catering ---------------------
    function tampil_kategori_land() 
    {
        $this->db->order_by('id_kategori_catering', 'ASC');
        $ambil = $this->db->get('kategori_catering');
        $data = $ambil->result_array();
        return $data;
    }

    function tampil_kategori() 
    {
        $this->db->order_by('id_kategori_catering', 'DESC');
        $ambil = $this->db->get('kategori_catering');
        $data = $ambil->result_array();
        return $data;
    }

    function ambil_kategori($id_kategori_catering) 
    {
        $this->db->where('id_kategori_catering', $id_kategori_catering);
        $ambil = $this->db->get('kategori_catering');
        $data = $ambil->row_array();
        return $data;
    }  

    function tambah_kategori($inputan)
    {
        $config['upload_path']    = './assets/img/kategori/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['width']       = 496;
        $config['height']       = 264;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('cover'))
        {
            $inputan['url_kategori']  = url_title($inputan['nama_kategori'],"-",TRUE);
            $this->db->insert('kategori_catering',$inputan);
        }
        else
        {
            $inputan['url_kategori']  = url_title($inputan['nama_kategori'],"-",TRUE);
            $inputan['cover'] = $this->upload->data('file_name');
            $this->db->insert('kategori_catering',$inputan);
        }
    }

    function ubah_kategori($inputan,$id_kategori_catering) 
    {
        $kategori = $this->ambil_kategori($id_kategori_catering);

        $config['upload_path'] = './assets/img/kategori/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['width'] = 933;
        $config['height'] = 407;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('cover'))
        {
            $inputan['url_kategori']  = url_title($inputan['nama_kategori'],"-",TRUE);
            $this->db->where('id_kategori_catering', $id_kategori_catering);
            $this->db->update('kategori_catering', $inputan);
        }

        if ($this->upload->do_upload('cover'))
        {
            $inputan['url_kategori']  = url_title($inputan['nama_kategori'],"-",TRUE);
            $inputan['cover'] = $this->upload->data('file_name');
            $foto = $kategori['cover'];

            if(file_exists("./assets/img/kategori/$foto"))
            {
                unlink("./assets/img/kategori/$foto");
            }

            $this->db->where('id_kategori_catering',$id_kategori_catering);
            $this->db->update('kategori_catering',$inputan);
        }
    }
    // --------------------- Kategori Catering ---------------------

    // --------------------- Paket Catering ---------------------
    function tampil_paket_catering() 
    {
        $this->db->order_by('id_paket_catering', 'DESC');
        $ambil = $this->db->get('paket_catering');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_paket_catering', $value['id_paket_catering']);
            $ambil1 = $this->db->get('sub_paket_catering');
            $data1 = $ambil1->result_array();
            $value['sub_paket'] = $data1;

            foreach ($data1 as $key2 => $value2) {
                $this->db->where('id_sub_paket', $value2['id_sub_paket']);
                $ambil2 = $this->db->get('foto_sub_paket');
                $data2 = $ambil2->result_array();
                $value['sub_paket'][$key2]['foto_sub'] = $data2;
            }

            $semua[] = $value;
        }

        return $semua;
    }

    function tampil_paket() 
    {
        $this->db->order_by('id_paket_catering', 'DESC');
        $ambil = $this->db->get('paket_catering');
        $data = $ambil->result_array();
        return $data;
    }

    function ambil_paket($id_paket_catering) 
    {
        $this->db->where('id_paket_catering', $id_paket_catering);
        $ambil = $this->db->get('paket_catering');
        $data = $ambil->row_array();
        return $data;
    }

    function tambah_paket($inputan)
    {
        $config['upload_path']    = './assets/img/paket/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['width']       = 182;
        $config['height']       = 182;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('cover'))
        {
            $this->db->insert('paket_catering',$inputan);
        }
        else
        {
            $inputan['cover'] = $this->upload->data('file_name');
            $this->db->insert('paket_catering',$inputan);
        }
    }

    function ubah_paket($inputan,$id_paket_catering) 
    {
        $paket = $this->ambil_paket($id_paket_catering);

        $config['upload_path'] = './assets/img/paket/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['width'] = 182;
        $config['height'] = 182;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('cover'))
        {
            $this->db->where('id_paket_catering', $id_paket_catering);
            $this->db->update('paket_catering', $inputan);
        }

        if ($this->upload->do_upload('cover'))
        {
            $inputan['cover'] = $this->upload->data('file_name');
            $foto = $paket['cover'];

            if(file_exists("./assets/img/paket/$foto"))
            {
                unlink("./assets/img/paket/$foto");
            }

            $this->db->where('id_paket_catering',$id_paket_catering);
            $this->db->update('paket_catering',$inputan);
        }
    }

    function ambil_sub_paket($id_paket_catering) 
    {
        $this->db->order_by('id_sub_paket', 'desc');
        $this->db->where('id_paket_catering', $id_paket_catering);
        $ambil = $this->db->get('sub_paket_catering');
        $data = $ambil->result_array();

        return $data;
    }

    function ambil_detail_sub_paket($id_sub_paket) 
    {
        $this->db->where('id_sub_paket', $id_sub_paket);
        $ambil = $this->db->get('sub_paket_catering');
        $data = $ambil->row_array();

        return $data;
    }

    function detail_sub_paket($id_sub_paket) 
    {
        $paket = $this->ambil_detail_sub_paket($id_sub_paket);
        $id_sub_paket = $paket['id_sub_paket'];

        $this->db->where('id_sub_paket', $id_sub_paket);
        $ambil = $this->db->get('foto_sub_paket');
        $data = $ambil->result_array();

        return $data;
    }

    function tambah_sub_paket($inputan,$id_paket_catering) 
    {
        $number_of_files = sizeof($_FILES['cover']['tmp_name']);
        $files = $_FILES['cover'];
        $config = array(
            'upload_path'    => './assets/img/sub_paket/',
            'allowed_types'  => 'gif|jpg|png',
            'max_size'       => 2048,
            'width'          => 479,
            'height'         => 479
            );

        if ($number_of_files>0) 
        {
            $inputan['id_paket_catering']  = $id_paket_catering;
            $inputan['url_sub_paket']  = url_title($inputan['judul'],"-",TRUE);
            $this->db->insert('sub_paket_catering',$inputan);

            $inputan1['id_sub_paket'] = $this->db->insert_id('sub_paket_catering');
            for ($i = 0;$i < $number_of_files; $i++)
            {
                if ($_FILES['produk']['error'][$i] == '0') {
                    $_FILES['cover']['name'] = $files['name'][$i];  
                    $_FILES['cover']['type'] = $files['type'][$i];  
                    $_FILES['cover']['tmp_name'] = $files['tmp_name'][$i];  
                    $_FILES['cover']['error'] = $files['error'][$i];  
                    $_FILES['cover']['size'] = $files['size'][$i];  

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('cover');

                    $data_upload = $this->upload->data();

                    $nama_file = $data_upload['file_name'];

                    $inputan1['nama_cover'] = $nama_file;
                    $this->db->insert('foto_sub_paket',$inputan1);
                }

                else {
                    $inputan1['nama_cover'] = 'default.png';
                    $this->db->insert('foto_sub_paket',$inputan1);
                }
            }

        }
        elseif ($number_of_files=0) {
            $inputan['id_paket_catering']  = $id_paket_catering;
            $this->db->insert('sub_paket_catering',$inputan);
        }

    }

    function ambil_hapus_sub_paket($id_sub_paket) 
    {
        $this->db->where('id_sub_paket', $id_sub_paket);
        $ambil = $this->db->get('sub_paket_catering');
        $data = $ambil->row_array();

        return $data;
    }

    function ambil_foto_sub_paket($id_sub_paket) 
    {
        $this->db->where('id_sub_paket', $id_sub_paket);
        $ambil = $this->db->get('foto_sub_paket');
        $data = $ambil->result_array();

        return $data;
    }

    function hapus_sub_paket($id_sub_paket) 
    {
        $this->db->where('id_sub_paket', $id_sub_paket);
        $ambil = $this->db->get('foto_sub_paket');
        $data = $ambil->result_array();

        if (empty($data)) {
            $this->db->where('id_sub_paket', $id_sub_paket);
            $this->db->delete('sub_paket_catering');
        }
        else
        {
            $this->db->where('id_sub_paket', $id_sub_paket);
            $this->db->delete('sub_paket_catering');

            foreach ($data as $key => $value) 
            {
                $foto = $value['nama_cover'];
                if (file_exists("./assets/img/sub_paket/$foto") && $foto == 'default.png') {
                    unlink("./assets/img/sub_paket/$foto");
                }
                $this->db->where('id_sub_paket', $id_sub_paket);
                $this->db->delete('foto_sub_paket'); 
            }
        }

    }

    function ubah_sub_paket($inputan,$id_sub_paket) 
    {
        $ambil = $this->ambil_foto_sub_paket($id_sub_paket);

        $number_of_files = sizeof($_FILES['cover']['tmp_name']);
        $files = $_FILES['cover'];
        $config = array(
            'upload_path'    => './assets/img/sub_paket/',
            'allowed_types'  => 'gif|jpg|png',
            'max_size'       => 2048,
            'width'          => 479,
            'height'         => 479
            );

        if ($number_of_files>0) 
        {
            foreach ($ambil as $key => $value) {

                $nama_cover = array($value['nama_cover']);
            }

            for($i = 0;$i < $number_of_files; $i++){

                if ($_FILES['cover']['error'][$i] == '0') {

                    $_FILES['cover']['name'] = $files['name'][$i];  
                    $_FILES['cover']['type'] = $files['type'][$i];  
                    $_FILES['cover']['tmp_name'] = $files['tmp_name'][$i];  
                    $_FILES['cover']['error'] = $files['error'][$i];  
                    $_FILES['cover']['size'] = $files['size'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('cover');

                    $data_upload = $this->upload->data();

                    $nama_file = $data_upload['file_name'];

                    $id_foto_sub_paket = $inputan['id_foto_sub_paket'][$i];

                    $this->db->where('id_foto_sub_paket', $id_foto_sub_paket);
                    $this->db->update('foto_sub_paket', array('nama_cover'=>$nama_file));
                }

            }

            unset($inputan['id_foto_sub_paket']);

            $this->db->where('id_sub_paket', $id_sub_paket);
            $this->db->update('sub_paket_catering',$inputan);
        }
        elseif ($number_of_files=0) {
            $this->db->where('id_sub_paket', $id_sub_paket);
            $this->db->update('sub_paket_catering',$inputan);
        }

    }

    // --------------------- Paket Catering ---------------------

}
?>