<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mproduk');
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
		$data['produk'] = $this->Mproduk->tampil();

		$menu = "produk";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/produk/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mbanner->tampil_kategori();

		$menu = "produk";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('id_kategori_catering', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('judul', 'Nama Judul', 'trim|required|is_unique[kategori_catering.nama_kategori]');
		$this->form_validation->set_rules('min_required', 'Minimal Required', 'trim|required');
		if (empty($_FILES['produk']['name']))
		{
			$this->form_validation->set_rules('produk[]', 'Foto', 'required');
		}
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
		$this->form_validation->set_rules('featured', 'Featured', 'trim');
		$this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
		$this->form_validation->set_rules('seo_deskripsi', 'SEO deskripsi', 'trim');
		$this->form_validation->set_rules('seo_keyword', 'SEO seo_keyword', 'trim');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['id_kategori_catering'] = $input['id_kategori_catering'];
			$inputan['judul'] = $input['judul'];
			$inputan['min_required'] = $input['min_required'];
			$inputan['deskripsi'] = $input['deskripsi'];
			$inputan['featured'] = isset($input['featured']) ? 'ya' : 'tidak';
			$inputan['seo_title'] = $input['seo_title'];
			$inputan['seo_deskripsi'] = $input['seo_deskripsi'];
			$inputan['seo_keyword'] = $input['seo_keyword'];

			$this->Mproduk->tambah($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/produk');
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/produk/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function detail($id_produk)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['produk'] = $this->Mproduk->ambil_produk($id_produk);
		$data['detail_produk'] = $this->Mproduk->ambil_foto_produk($id_produk);

		$menu = "produk";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/produk/detail',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah($id_produk)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mbanner->tampil_kategori();
		$data['produk'] = $this->Mproduk->ambil_produk($id_produk);
		$data['detail_produk'] = $this->Mproduk->ambil_foto_produk($id_produk);

		$menu = "produk";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('id_kategori_catering', 'Kategori', 'trim');
		$this->form_validation->set_rules('judul', 'Nama Judul', 'trim|required');
		$this->form_validation->set_rules('min_required', 'Minimal Required', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
		$this->form_validation->set_rules('featured', 'Featured', 'trim');
		$this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
		$this->form_validation->set_rules('seo_deskripsi', 'SEO deskripsi', 'trim');
		$this->form_validation->set_rules('seo_keyword', 'SEO seo_keyword', 'trim');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['id_kategori_catering'] = $input['id_kategori_catering'];
			$inputan['judul'] = $input['judul'];
			$inputan['min_required'] = $input['min_required'];
			$inputan['deskripsi'] = $input['deskripsi'];
			$inputan['featured'] = isset($input['featured']) ? 'ya' : 'tidak';
			$inputan['seo_title'] = $input['seo_title'];
			$inputan['seo_deskripsi'] = $input['seo_deskripsi'];
			$inputan['seo_keyword'] = $input['seo_keyword'];
			$inputan['id_foto_produk'] = $input['id_foto_produk'];

			$this->Mproduk->ubah($inputan, $id_produk);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/produk');
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/produk/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function hapus($id_produk)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$this->Mproduk->hapus($id_produk);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Data berhasil dihapus</div>');

		redirect('admin/produk');	

	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/produk.php */ 
?>