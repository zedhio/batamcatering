<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		$this->load->model('Mpengaturan');
	}

	public function login_admin()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$email = $input['email'];
			$password = sha1($input['password']);

			$check = $this->Mlogin->login_admin($email, $password);
			if ($check=="admin") 
			{
				$this->session->set_flashdata('welcome', '<div class="col-sm-12 col-md-12"><div class="card"><div class="card-header"><div class="cardtext-small"><p>Selamat datang di halaman dashboard admin!</p></div></div></div></div>');
				redirect('admin/dashboard');	
			}

			else
			{
				$this->session->set_flashdata('alert', '<p style="color: red; font-size: 14px;">Periksa kembali email dan password anda</p>');
			}

		}

		$this->load->view('admin/login');
	}

	public function logout_admin()
	{
		$this->Mlogin->logout_admin();
		echo "<script>";
		echo "location='".base_url('admin')."';";
		echo "</script>";
	}

}