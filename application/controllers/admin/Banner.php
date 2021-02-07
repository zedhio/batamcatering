<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mbanner');

		if (!$this->session->userdata('admin')) {
			$this->session->set_flashdata('alert', '<br/><small class="p-b-10" style="color: red;">Anda harus login terlebih dahulu</small>');
			redirect('admin');
		}

	}

	// --------------------- Kategori Catering ---------------------
	public function kategori()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$data['kategori'] = $this->Mbanner->tampil_kategori();

		$menu = "kategori";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/kategori/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah_kategori()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$menu = "banner";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|is_unique[kategori_catering.nama_kategori]');
		if (empty($_FILES['cover']['name']))
		{
			$this->form_validation->set_rules('cover', 'Cover', 'trim|required');
		}

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama_kategori'] = $input['nama_kategori'];

			$this->Mbanner->tambah_kategori($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/kategori');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/kategori/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah_kategori($id_kategori_catering)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mbanner->ambil_kategori($id_kategori_catering);

		$menu = "kategori";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama_kategori'] = $input['nama_kategori'];

			$this->Mbanner->ubah_kategori($inputan, $id_kategori_catering);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/kategori');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/kategori/ubah',$data);
		$this->load->view('admin/footer',$data);
	}
	// --------------------- Kategori Catering ---------------------

	// --------------------- Paket Catering ---------------------
	public function paket()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$data['paket'] = $this->Mbanner->tampil_paket();

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah_paket()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama_paket', 'Nama Paket', 'trim|required|is_unique[paket_catering.nama_paket]');
		if (empty($_FILES['cover']['name']))
		{
			$this->form_validation->set_rules('cover', 'Cover', 'required');
		}

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama_paket'] = $input['nama_paket'];

			$this->Mbanner->tambah_paket($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/paket');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah_paket($id_paket_catering)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['paket'] = $this->Mbanner->ambil_paket($id_paket_catering);

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama_paket', 'Nama Paket', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama_paket'] = $input['nama_paket'];

			$this->Mbanner->ubah_paket($inputan, $id_paket_catering);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/paket');
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function detail_paket($id_paket_catering)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['paket'] = $this->Mbanner->ambil_paket($id_paket_catering);
		$data['sub_paket'] = $this->Mbanner->ambil_sub_paket($id_paket_catering);

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/detail',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah_sub_paket($id_paket_catering)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['paket'] = $this->Mbanner->ambil_paket($id_paket_catering);

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('judul', 'Judul Sub Paket', 'trim|required|is_unique[sub_paket_catering.judul]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Sub Paket', 'trim|required');
		$this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
		$this->form_validation->set_rules('seo_deskripsi', 'SEO Deskripsi', 'trim');
		$this->form_validation->set_rules('seo_keyword', 'SEO Keyword', 'trim');
		$this->form_validation->set_rules('seo_tags', 'SEO Tags', 'trim');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['judul'] = $input['judul'];
			$inputan['deskripsi'] = $input['deskripsi'];
			$inputan['seo_title'] = $input['seo_title'];
			$inputan['seo_deskripsi'] = $input['seo_deskripsi'];
			$inputan['seo_keyword'] = $input['seo_keyword'];

			$this->Mbanner->tambah_sub_paket($inputan, $id_paket_catering);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/paket/detail/'.$id_paket_catering);	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/sub_tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function detail_sub_paket($id_sub_paket)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['sub_paket'] = $this->Mbanner->ambil_detail_sub_paket($id_sub_paket);
		$data['detail_sub_paket'] = $this->Mbanner->detail_sub_paket($id_sub_paket);

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/sub_detail',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah_sub_paket($id_sub_paket)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['sub_paket'] = $this->Mbanner->ambil_hapus_sub_paket($id_sub_paket);
		$data['foto_sub_paket'] = $this->Mbanner->ambil_foto_sub_paket($id_sub_paket);
		$data['hapus'] = $this->Mbanner->ambil_hapus_sub_paket($id_sub_paket);
		$id_paket_catering = $data['hapus']['id_paket_catering'];

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('judul', 'Judul Sub Paket', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Sub Paket', 'trim|required');
		$this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
		$this->form_validation->set_rules('seo_deskripsi', 'SEO Deskripsi', 'trim');
		$this->form_validation->set_rules('seo_keyword', 'SEO Keyword', 'trim');
		$this->form_validation->set_rules('seo_tags', 'SEO Tags', 'trim');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['judul'] = $input['judul'];
			$inputan['deskripsi'] = $input['deskripsi'];
			$inputan['seo_title'] = $input['seo_title'];
			$inputan['seo_deskripsi'] = $input['seo_deskripsi'];
			$inputan['seo_keyword'] = $input['seo_keyword'];

			$inputan['id_foto_sub_paket'] = $input['id_foto_sub_paket'];

			$this->Mbanner->ubah_sub_paket($inputan, $id_sub_paket);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/paket/detail/'.$id_paket_catering);
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/paket/sub_ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function hapus_sub_paket($id_sub_paket)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['hapus'] = $this->Mbanner->ambil_hapus_sub_paket($id_sub_paket);
		$id_paket_catering = $data['hapus']['id_paket_catering'];

		$this->Mbanner->hapus_sub_paket($id_sub_paket);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Data berhasil dihapus</div>');
		redirect('admin/paket/detail/'.$id_paket_catering);	

	}
	// --------------------- Paket Catering ---------------------

}

/* End of file Event.php */
/* Location: ./application/controllers/admin/banner.php */ 
?>