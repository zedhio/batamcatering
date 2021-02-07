<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mblog');

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
		$data['blog'] = $this->Mblog->tampil_blog();

		$menu = "blog";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/blog/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mblog->tampil_kategori_blog();

		$menu = "blog";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('id_kategori_blog', 'Kategori Blog', 'trim|required');
		$this->form_validation->set_rules('judul', 'judul', 'trim|required|is_unique[blog.judul]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('featured', 'Featured', 'trim');
		if (empty($_FILES['foto']['name']))
		{
			$this->form_validation->set_rules('foto', 'Foto', 'required');
		}
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
		$this->form_validation->set_rules('seo_deskripsi', 'SEO Deskripsi', 'trim');
		$this->form_validation->set_rules('seo_keyword', 'SEO Keyword', 'trim');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} ini sudah ada, ganti yang lain!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['id_kategori_blog'] = $input['id_kategori_blog'];
			$inputan['judul'] = $input['judul'];
			$inputan['deskripsi'] = $input['deskripsi'];
			$inputan['featured'] = isset($input['featured']) ? 'ya' : 'tidak';
			$inputan['status'] = $input['status'];
			$inputan['seo_title'] = $input['seo_title'];
			$inputan['seo_deskripsi'] = $input['seo_deskripsi'];
			$inputan['seo_keyword'] = $input['seo_keyword'];

			$this->Mblog->tambah_blog($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/blog');	
		}
		else
		{
			$data["error"] = validation_errors();
		}
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/blog/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah($id_blog)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mblog->tampil_kategori_blog();
		$data['blog'] = $this->Mblog->ambil_blog($id_blog);
		$data['status'] = array(
			'draft',
			'publish'
			);

		$menu = "blog";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('id_kategori_blog', 'Kategori Blog', 'trim|required');
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('featured', 'Featured', 'trim');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
		$this->form_validation->set_rules('seo_deskripsi', 'SEO Deskripsi', 'trim');
		$this->form_validation->set_rules('seo_keyword', 'SEO Keyword', 'trim');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['id_kategori_blog'] = $input['id_kategori_blog'];
			$inputan['judul'] = $input['judul'];
			$inputan['deskripsi'] = $input['deskripsi'];
			$inputan['featured'] = isset($input['featured']) ? 'ya' : 'tidak';
			$inputan['status'] = $input['status'];
			$inputan['seo_title'] = $input['seo_title'];
			$inputan['seo_deskripsi'] = $input['seo_deskripsi'];
			$inputan['seo_keyword'] = $input['seo_keyword'];

			$this->Mblog->ubah_blog($inputan,$id_blog);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/blog');	
		}
		else
		{
			$data["error"] = validation_errors();
		}
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/blog/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function detail($id_blog)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['blog'] = $this->Mblog->ambil_blog($id_blog);

		$menu = "blog";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/blog/detail',$data);
		$this->load->view('admin/footer',$data);
	}

	public function hapus($id_blog)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$this->Mblog->hapus($id_blog);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Data berhasil dihapus</div>');
		redirect('admin/blog');
	}

	public function kategori()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori_blog'] = $this->Mblog->tampil_kategori_blog();

		$menu = "kategori_blog";
		$data['menu'] = $menu;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/kategori_blog/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah_kategori()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$menu = "kategori_blog";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama_kategori_blog', 'Nama Kategori BLog', 'trim|required|is_unique[kategori_blog.nama_kategori_blog]');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama_kategori_blog'] = $input['nama_kategori_blog'];

			$this->Mblog->tambah_kategori_blog($inputan);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
			redirect('admin/kategori-blog');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/kategori_blog/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah_kategori($id_kategori_blog)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mblog->ambil_kategori_blog($id_kategori_blog);

		$menu = "kategori_blog";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nama_kategori_blog', 'Nama Kategori Blog', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$inputan['nama_kategori_blog'] = $input['nama_kategori_blog'];

			$this->Mblog->ubah_kategori($inputan, $id_kategori_blog);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
			redirect('admin/kategori-blog');	
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/kategori_blog/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file respon.php */
/* Location: ./application/controllers/admin/respon.php */ 
?>