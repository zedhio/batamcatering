<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	// ------------------- Admin -------------------

	function login_admin($email, $password) 
	{
		$this->db->where('level', 'admin');
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$ambil = $this->db->get('user');
		$dataygcocok = $ambil->num_rows();

		if ($dataygcocok==1) 
		{
			$pecah = $ambil->row_array();
			$this->session->set_userdata('admin',$pecah);
			return "admin";
		}
		else
		{
			return "gagal_admin";
		}
	}

	function logout_admin() 
	{
		session_destroy();
	}

	// ------------------- Admin -------------------


	function pengaturan()
	{
		$id_config = 1;
		$this->db->where('id_config', $id_config);
		$ambil = $this->db->get('config');
		$data = $ambil->row_array();

		return $data;
	}

	function ubah_password($password, $token)
	{
		$pass['password'] = sha1($password);

		$this->db->set('password', $pass['password']);
		$this->db->where('token', $token);
		$this->db->update('user');
	}

	// ------------------- Member -------------------

}
?>