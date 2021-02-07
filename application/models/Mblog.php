<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mblog extends CI_Model {

    // --------------------- Model untuk admin ---------------------
    function blog_populer() 
    {
        $this->db->limit(3, 0);
        $this->db->order_by('hits', 'DESC');
        $link = substr($_SERVER['REQUEST_URI'], 0, 34);
        $this->db->like('url', $link);
        $ambil = $this->db->get('analytic');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $pecah = explode('/', $value['url'], 6);
            $this->db->where('url_blog', $pecah[5]);
            $ambil1 = $this->db->get('blog');
            $data1 = $ambil1->result_array();
            $value['blog'] = $data1;            
            $semua[] = $value;
        }

        return $semua;
    }

    function blog_terbaru() 
    {
        $this->db->limit(3, 0);
        $this->db->order_by('id_blog', 'DESC');
        $ambil = $this->db->get('blog');
        $data = $ambil->result_array();
        return $data;
    }

    function blog_detail($url_blog) 
    {
        $this->db->join('kategori_blog', 'blog.id_kategori_blog = kategori_blog.id_kategori_blog', 'left');
        $this->db->where('url_blog', $url_blog);
        $ambil = $this->db->get('blog');
        $data = $ambil->row_array();
        return $data;
    }

    function tampil_blog($url_kategori='', $cari='') 
    {
        $this->db->order_by('id_blog', 'DESC');
        $this->db->join('kategori_blog', 'blog.id_kategori_blog = kategori_blog.id_kategori_blog', 'left');

        if (!empty($url_kategori)) {
            $this->db->where('url_kategori_blog', $url_kategori);
        }

        if (!empty($cari)) {
            $this->db->like('nama_kategori_blog', $cari);
            $this->db->or_like('nama_kategori_blog', $cari);
            $this->db->or_like('judul', $cari);
        }

        $ambil = $this->db->get('blog');
        $data = $ambil->result_array();
        return $data;
    }

    function tampil_blog_land() 
    {
        $this->db->order_by('id_blog', 'DESC');
        $this->db->limit(4, 0);
        $this->db->join('kategori_blog', 'blog.id_kategori_blog = kategori_blog.id_kategori_blog', 'left');
        $ambil = $this->db->get('blog');
        $data = $ambil->result_array();
        return $data;
    }

    function tambah_blog($inputan)
    {
        $config['upload_path']    = './assets/img/blog/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['width']       = 900;
        $config['height']       = 466;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
            $inputan['tgl_post'] = date('Y-m-d');
            $inputan['url_blog']  = url_title($inputan['judul'],"-",TRUE);
            $this->db->insert('blog',$inputan);
        }
        else
        {
            $inputan['foto'] = $this->upload->data('file_name');
            $inputan['tgl_post'] = date('Y-m-d');
            $inputan['url_blog']  = url_title($inputan['judul'],"-",TRUE);
            $this->db->insert('blog',$inputan);
        }
    }

    function ubah_blog($inputan,$id_blog) 
    {
        $blog = $this->ambil_blog($id_blog);

        $config['upload_path'] = './assets/img/blog/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['width'] = 900;
        $config['height'] = 466;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
            if (isset($inputan['featured'])) { 
                $inputan['tgl_post'] = date('Y-m-d');
                $inputan['url_blog']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_blog', $id_blog);
                $this->db->update('blog', $inputan);
            }
            else{
                $inputan['featured'] = "tidak";
                $inputan['tgl_post'] = date('Y-m-d');
                $inputan['url_blog']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_blog', $id_blog);
                $this->db->update('blog', $inputan);
            }
        }

        if ($this->upload->do_upload('foto'))
        {
            $inputan['foto'] = $this->upload->data('file_name');
            $foto = $blog['foto'];

            if(file_exists("./assets/img/blog/$foto"))
            {
                unlink("./assets/img/blog/$foto");
            }

            if (isset($inputan['featured'])) {   
                $inputan['tgl_post'] = date('Y-m-d');
                $inputan['url_blog']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_blog', $id_blog);
                $this->db->update('blog', $inputan);
            }
            else{
                $inputan['featured'] = "tidak";
                $inputan['tgl_post'] = date('Y-m-d');
                $inputan['url_blog']  = url_title($inputan['judul'],"-",TRUE);
                $this->db->where('id_blog', $id_blog);
                $this->db->update('blog', $inputan);
            }
        }
    }

    function ambil_blog($id_blog) 
    {
        $this->db->join('kategori_blog', 'blog.id_kategori_blog = kategori_blog.id_kategori_blog', 'left');
        $this->db->where('id_blog', $id_blog);
        $ambil = $this->db->get('blog');
        $data = $ambil->row_array();
        return $data;
    }

    function hapus($id_blog) 
    {
        $blog = $this->ambil_blog($id_blog);

        $foto = $blog['foto'];
        unlink("./assets/img/blog/$foto");
        $this->db->where('id_blog', $id_blog);
        $this->db->delete('blog'); 
    }

    function tampil_kategori_blog() 
    {
        $this->db->order_by('id_kategori_blog', 'DESC');
        $ambil = $this->db->get('kategori_blog');
        $data = $ambil->result_array();
        return $data;
    }

    function tambah_kategori_blog($inputan)
    {
        $inputan['url_kategori_blog']  = url_title($inputan['nama_kategori_blog'],"-",TRUE);
        $this->db->insert('kategori_blog',$inputan);
    }

    function ambil_kategori_blog($id_kategori_blog) 
    {
        $this->db->where('id_kategori_blog', $id_kategori_blog);
        $ambil = $this->db->get('kategori_blog');
        $data = $ambil->row_array();
        return $data;
    }

    function ubah_kategori($inputan,$id_kategori_blog) 
    {
        $inputan['url_kategori_blog']  = url_title($inputan['nama_kategori_blog'],"-",TRUE);
        $this->db->where('id_kategori_blog',$id_kategori_blog);
        $this->db->update('kategori_blog',$inputan);
    }

}
?>