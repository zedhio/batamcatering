<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mblog');
		$this->load->model('Mproduk');
		$this->load->model('Mbanner');
		$this->load->model('Mgaleri');
		$this->load->model('Mtestimoni');
	}

	public function index()
	{
		$data['blog'] = $this->Mblog->tampil_blog_land();	
		$data['produk'] = $this->Mproduk->tampil_land();	
		$data['kategori'] = $this->Mbanner->tampil_kategori_land();	
		$data['banner'] = $this->Mbanner->tampil_banner();	
		$data['testimoni'] = $this->Mtestimoni->tampil();	

		if (get_setting('status')==1) {

			$this->load->library("form_validation");

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[saran_pertanyaan.nama]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[saran_pertanyaan.email]|valid_email');

			$this->form_validation->set_message('required', '{field} can not be empty!');

			$this->form_validation->set_message('is_unique', '{field} already sent your suggestions / questions!');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['nama'] = $input['nama'];
				$inputan['email'] = $input['email'];

				$this->Mpengaturan->tambah_saran($inputan);
				$this->session->set_flashdata('alert', '<p class="m1-txt1 p-b-36" style="color: green;">Your Suggestion / Question Was Successfully Sent To Us. Thank you!!!</p>');
				redirect('');	
			}
			else
			{
				$data["error"] = validation_errors();
			}

			$this->load->view('maintenance/tampil', $data);
		}
		else{
			
			$menu = "beranda";
			$data['menu'] = $menu;

			$this->load->view('pengunjung/header', $data);
			$this->load->view('pengunjung/home', $data);
			$this->load->view('pengunjung/footer', $data);
		}
	}

	public function paket()
	{
		$data['paket'] = $this->Mbanner->tampil_paket_catering();	

		$menu = "paket";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/paket', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function kontak()
	{
		$menu = "kontak";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[saran_pertanyaan.nama]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[saran_pertanyaan.email]|valid_email');
		$this->form_validation->set_rules('no_hp', 'No.HP', 'trim|required|is_unique[saran_pertanyaan.no_hp]|numeric|min_length[12]');
		$this->form_validation->set_rules('komentar_pertanyaan', 'Komentar / Pertanyaan', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		$this->form_validation->set_message('is_unique', '{field} sudah mengirimkan saran/pertanyaan!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama'] = $input['nama'];
			$inputan['email'] = $input['email'];
			$inputan['no_hp'] = $input['no_hp'];
			$inputan['komentar_pertanyaan'] = $input['komentar_pertanyaan'];

			$this->Mpengaturan->tambah_saran($inputan);
			$this->session->set_flashdata('alert', '<span style="color: green;">Saran / Pertanyaan Anda Berhasil Terkirim Ke Kami. Terimakasih!!!</span>');
			redirect('/kontak');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/kontak', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function tentang_kami()
	{	
		$menu = "beranda";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/tentang', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function menu($url_kategori = '')
	{
		$data['kategori'] = $this->Mproduk->tampil_kategori_land();

		if ($this->input->get('kategori')) {
			$url_kategori = $this->input->get('kategori');
		}
		
		$data['produk'] = $this->Mproduk->tampil($url_kategori);

		$menu = "menu";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/menu', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function menu_detail($url_produk)
	{
		$data['produk'] = $this->Mproduk->menu_detail($url_produk);
		$data['detail'] = $this->Mproduk->detail_produk($url_produk);

		$menu = "menu";
		$data['menu'] = $menu;

		$this->meta_title($data['produk']['seo_title']);
		$this->meta_description($data['produk']['seo_deskripsi']);
		$this->meta_keyword($data['produk']['seo_keyword']);

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/menu_detail', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function produk_unggulan()
	{
		$data['produk'] = $this->Mproduk->tampil_land();
		$data['kategori'] = $this->Mproduk->tampil_kategori_land();

		if ($this->input->post('btn_kategori')) {
			$id_kategori_catering  = $this->input->post('kategori');
			$data['produk'] = $this->Mproduk->filter($id_kategori_catering);
		}

		$menu = "beranda";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/produk_unggulan', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function menu_unggulan($url_produk)
	{
		$data['produk'] = $this->Mproduk->menu_detail($url_produk);
		$data['detail'] = $this->Mproduk->detail_produk($url_produk);

		$menu = "menu";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/menu_unggulan', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function galeri()
	{
		$data['galeri'] = $this->Mgaleri->tampil();

		$tgl_awal = $this->input->get('tanggal_awal');
		$tgl_akhir = $this->input->get('tanggal_akhir');

		$data['galeri'] = $this->Mgaleri->filter($tgl_awal, $tgl_akhir);

		$menu = "galeri";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/galeri', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function faq()
	{
		$menu = "beranda";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/faq', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function blog($url_kategori = '', $cari = '')
	{
		$data['kategori'] = $this->Mblog->tampil_kategori_blog();	

		if ($this->input->get('kategori')) {
			$url_kategori = $this->input->get('kategori');
		}

		if ($this->input->get('cari')) {
			$cari = $this->input->get('cari');
		}

		$data['blog'] = $this->Mblog->tampil_blog($url_kategori, $cari);	

		$menu = "blog";
		$data['menu'] = $menu;

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/blog', $data);
		$this->load->view('pengunjung/footer', $data);
	}

	public function blog_detail($url_blog)
	{	
		$data['blog'] = $this->Mblog->blog_detail($url_blog);	
		$data['terbaru'] = $this->Mblog->blog_terbaru();	
		$data['populer'] = $this->Mblog->blog_populer();	

		$menu = "blog";
		$data['menu'] = $menu;

		$this->meta_title($data['blog']['seo_title']);
		$this->meta_description($data['blog']['seo_deskripsi']);
		$this->meta_keyword($data['blog']['seo_keyword']);

		$this->load->view('pengunjung/header', $data);
		$this->load->view('pengunjung/blog_detail', $data);
		$this->load->view('pengunjung/footer', $data);
	}

}