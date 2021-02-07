<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mtestimoni');

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
		$data['testimoni'] = $this->Mtestimoni->tampil();

		$menu = "galeri";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/testimoni/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$menu = "testimoni";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[testimoni.tambah]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('testimoni', 'Testimoni', 'trim|required');
		if (empty($_FILES['foto']['name']))
		{
			$this->form_validation->set_rules('foto', 'Foto', 'required');
		}

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama'] = $input['nama'];
			$inputan['jabatan'] = $input['jabatan'];
			$inputan['testimoni'] = $input['testimoni'];

			$this->Mtestimoni->tambah($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/testimoni');
		}
		else
		{
			$data["error"] = validation_errors();
		}
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/testimoni/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah($id_testimoni)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['testimoni'] = $this->Mtestimoni->ambil_testimoni($id_testimoni);

		$menu = "testimoni";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim');
		$this->form_validation->set_rules('testimoni', 'Testimoni', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama'] = $input['nama'];
			$inputan['jabatan'] = $input['jabatan'];
			$inputan['tesimoni'] = $input['testimoni'];

			$this->Mtestimoni->ubah($inputan, $id_testimoni);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/testimoni');	
		}
		else
		{
			$data["error"] = validation_errors();
		}
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/testimoni/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function hapus($id_testimoni)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$this->Mtestimoni->hapus($id_testimoni);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Data berhasil dihapus</div>');
		redirect('admin/testimoni');	

	}

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/admin/Testimoni.php */