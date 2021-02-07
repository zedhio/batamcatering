<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');

		// Agar login user tidak jebol
		if (!$this->session->userdata('admin')) {
			$this->session->set_flashdata('alert', '<br/><small class="p-b-10" style="color: red;">Anda harus login terlebih dahulu</small>');
			redirect('admin');
		}

	}

	public function index()
	{
		$session = $this->session->userdata('admin');

		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$menu = "";
		$data['menu'] = $menu;

		$menu1 = "profil";
		$data['menu1'] = $menu1;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');

		if ($this->form_validation->run() == TRUE) 
		{
			$this->Mprofil->ubah_profil_admin($this->input->post(), $level);
			if (!empty($this->input->post('password'))) {
				$this->session->set_flashdata('alert', '<div class="alert alert-success">Password berhasil diubah</div>');
				redirect('admin/profil');		
			}
			else
			{
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">Password gagal diubah dikarenakan inputan kosong</div>');
				redirect('admin/profil');
			}
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/profil/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */ 
?>