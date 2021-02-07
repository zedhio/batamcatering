<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mprofil extends CI_Model {

    // --------------------- Model untuk admin ---------------------

    // --------------------- Model untuk admin ---------------------
    function ambil_admin($level) 
    {
        $this->db->where('level', $level);
        $ambil = $this->db->get('user');
        $data = $ambil->row_array();
        return $data;
    }    

    function ubah_profil_admin($input,$level) 
    {

        if (!empty($input['password'])) 
        {
            $inputan['password'] = sha1($input['password']);
            $this->db->where('level', $level);
            $this->db->update('user', $inputan);
        }

    }

    // --------------------- Model untuk admin ---------------------

    function ambil_member($id_user) 
    {
        $this->db->join('dokumen_user', 'user.id_user = dokumen_user.id_user', 'left');
        $this->db->where('user.id_user', $id_user);
        $ambil = $this->db->get('user');
        $data = $ambil->row_array();
        return $data;
    }

    function ubah_member($data,$id_user) 
    {
        $member = $this->ambil_member($id_user);

        $config['upload_path']          = './assets/img/member/logo';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['width']                = 100;
        $config['height']               = 100;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data);
        }

        else
        {
            $data['logo'] = $this->upload->data('file_name');
            $foto = $member['logo'];

            if(file_exists("./assets/img/member/logo/$foto"))
            {
                unlink("./assets/img/member/logo/$foto");
            }

            $this->db->where('id_user',$id_user);
            $this->db->update('user',$data);
        }
    }

    function ubah_password_member($data,$id_user) 
    {
        $input['password'] = sha1($data['password']);

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $input);
    }

    function ubah_dokumen_member($data,$id_user) 
    {
        $member = $this->ambil_member($id_user);

        $config['upload_path']          = './assets/img/member/dokumen';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('dokumen_ktp'))
        {
            $this->db->where('id_user', $id_user);
            $this->db->update('dokumen_user', $data);
        }

        else
        {
            $data['dokumen_ktp'] = $this->upload->data('file_name');
            $foto = $member['dokumen_ktp'];

            if(file_exists("./assets/img/member/dokumen/$foto"))
            {
                unlink("./assets/img/member/dokumen/$foto");
            }

            $this->db->where('id_user',$id_user);
            $this->db->update('dokumen_user',$data);
        }
    }

    // --------------------- Akhir model untuk Member ---------------------

    // --------------------- Model untuk user ---------------------

    function ambil_karyawan($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $ambil = $this->db->get('karyawan');
        $data = $ambil->row_array();
        return $data;
    }

    function ambil_user($id_user) 
    {
        $this->db->join('karyawan', 'user.id_karyawan = karyawan.id_karyawan', 'left');
        $this->db->join('jabatan', 'karyawan.id_jabatan = jabatan.id_jabatan', 'left');
        $this->db->join('bagian', 'karyawan.id_bagian = bagian.id_bagian', 'left');
        $this->db->where('id_user', $id_user);
        $ambil = $this->db->get('user');
        $data = $ambil->row_array();
        return $data;
    }

    function ubah_user($input_user, $inputan, $id_user) 
    {
        $user = $this->ambil_user($id_user);
        $karyawan = $this->ambil_karyawan($user['id_karyawan']);

        $config['upload_path']          = './assets/images/foto_karyawan/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto_karyawan'))
        {
            if (! empty($input_user)) {
                $input_user['password']= sha1($input_user['password']);
                $this->db->where('id_user', $id_user);
                $this->db->update('user', $input_user);    
            }
            $this->db->where('id_karyawan', $user['id_karyawan']);
            $this->db->update('karyawan', $inputan);
        }
        else
        {
            if (! empty($input_user)) {
                $this->db->where('id_user', $id_user);
                $this->db->update('user', $input_user);
            }

            $inputan['foto_karyawan'] = $this->upload->data('file_name');
            $foto = $karyawan['foto_karyawan'];

            if(file_exists("./assets/images/foto_karyawan/$foto"))
            {
                unlink("./assets/images/foto_karyawan/$foto");
            }

            $this->db->where('id_karyawan',$user['id_karyawan']);
            $this->db->update('karyawan',$inputan);
        }
    }

}
?>