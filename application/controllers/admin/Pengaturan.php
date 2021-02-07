<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mpengaturan');
		$this->load->model('Mbanner');

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

		$id_pengaturan = 1;
		$data['meta'] = $this->Mpengaturan->ambil_config($id_pengaturan);
		$data['banner'] = $this->Mbanner->tampil_banner();

		$data['status'] = array(
			'Tidak Aktif',
			'Aktif'
			);

		$menu = "pengaturan";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		if ($this->input->post('meta')) 
		{

			//set meta validation
			$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|required');
			$this->form_validation->set_rules('meta_author', 'Meta Author', 'trim|required');
			$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
			$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['meta_keyword'] = $input['meta_keyword'];
				$inputan['meta_author'] = $input['meta_author'];
				$inputan['meta_title'] = $input['meta_title'];
				$inputan['meta_description'] = $input['meta_description'];

				$this->Mpengaturan->ubah_meta($inputan, $id_pengaturan);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Meta Utama berhasil diubah</div>');
				redirect('admin/pengaturan');	
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		if ($this->input->post('sosmed')) 
		{

			//set sosmed validation
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|valid_url');
			$this->form_validation->set_rules('instagram', 'Instagram', 'trim|required|valid_url');
			$this->form_validation->set_rules('youtube', 'Youtube', 'trim|required|valid_url');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['facebook'] = $input['facebook'];
				$inputan['instagram'] = $input['instagram'];
				$inputan['youtube'] = $input['youtube'];

				$this->Mpengaturan->ubah_sosmed($inputan, $id_pengaturan);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Sosmed berhasil diubah</div>');
				redirect('admin/pengaturan');	
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		if ($this->input->post('kontak')) 
		{

			//set tampilan validation
			$this->form_validation->set_rules('no_hp1', 'No.HP 1', 'trim|required|numeric|min_length[13]');
			$this->form_validation->set_rules('no_hp2', 'No.HP 2', 'trim|required|numeric|min_length[13]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['no_hp1'] = $input['no_hp1'];
				$inputan['no_hp2'] = $input['no_hp2'];
				$inputan['email'] = $input['email'];
				$inputan['alamat'] = $input['alamat'];

				$this->Mpengaturan->ubah_kontak($inputan, $id_pengaturan);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Kontak berhasil diubah</div>');
				redirect('admin/pengaturan');	
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		if ($this->input->post('lain')) 
		{

			$this->form_validation->set_rules('faq', 'FAQ', 'trim|required');
			$this->form_validation->set_rules('tentang', 'Tentang', 'trim|required');
			$this->form_validation->set_rules('status', 'Status Maintenance', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['faq'] = $input['faq'];
				$inputan['tentang'] = $input['tentang'];
				$inputan['status'] = $input['status'];

				$this->Mpengaturan->ubah_lainnya($inputan, $id_pengaturan);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Lain - Lain berhasil diubah</div>');
				redirect('admin/pengaturan');	
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		if ($this->input->post('banner')) 
		{
			// if ($this->form_validation->run() == TRUE) 
			// {
				$input = $this->input->post();
				$inputan['id_banner'] = $input['id_banner'];
				
				$this->Mbanner->ubah_banner($inputan);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Support berhasil diubah</div>');
				redirect('admin/pengaturan');
			// }

			// else
			// {
			// 	$data["error"] = validation_errors();
			// }
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/pengaturan/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/admin/Pengaturan.php */ 
?>