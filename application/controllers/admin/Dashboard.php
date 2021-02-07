<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mbanner');
		$this->load->model('Mproduk');
		$this->load->model('Mblog');

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
		$data['paket'] = $this->Mbanner->tampil_paket();
		$data['produk'] = $this->Mproduk->tampil();
		$data['blog'] = $this->Mblog->tampil_blog();
		$data['saran'] = $this->Mbanner->tampil_saran();

		$id_config = 1;

		$menu = "dashboard";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */ 
?>