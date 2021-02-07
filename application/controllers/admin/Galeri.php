<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mgaleri');

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
		$data['galeri'] = $this->Mgaleri->tampil();

		$menu = "galeri";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/galeri/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$this->load->library("form_validation");

		$this->form_validation->set_rules('event', 'Nama Event', 'trim|required|is_unique[galeri.event]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('tgl_event', 'Tanggal Event', 'trim|required');
		if (empty($_FILES['foto']['name']))
		{
			$this->form_validation->set_rules('foto', 'Foto', 'required');
		}

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['event'] = $input['event'];
			$inputan['alamat'] = $input['alamat'];
			$inputan['tgl_event'] = $input['tgl_event'];

			$this->Mgaleri->tambah($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/galeri');
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$menu = "galeri";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/galeri/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah($id_galeri)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['galeri'] = $this->Mgaleri->ambil_galeri($id_galeri);

		$this->load->library("form_validation");

		$this->form_validation->set_rules('event', 'Nama Event', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('tgl_event', 'Tanggal Event', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['event'] = $input['event'];
			$inputan['alamat'] = $input['alamat'];
			$inputan['tgl_event'] = $input['tgl_event'];

			$this->Mgaleri->ubah($inputan, $id_galeri);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/galeri');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$menu = "galeri";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/galeri/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function hapus($id_galeri)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$this->Mgaleri->hapus($id_galeri);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Data berhasil dihapus</div>');
		redirect('admin/galeri');	

	}

}

/* End of file Visitor.php */
/* Location: ./application/controllers/admin/visitor.php */ 
?>