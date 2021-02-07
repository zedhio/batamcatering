<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgaleri extends CI_Model {

	function filter($tgl_awal = '', $tgl_akhir)
	{
		if (!empty($tgl_awal) && !empty($tgl_akhir)) {
			$this->db->where('tgl_event BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
		}
		$ambil1 = $this->db->get('galeri');
		$data1 = $ambil1->result_array();

		return $data1;
	}

	function tampil() 
	{
		$this->db->order_by('id_galeri', 'DESC');
		$ambil = $this->db->get('galeri');
		$data = $ambil->result_array();
		return $data;
	}

	function ambil_galeri($id_galeri) 
	{
		$this->db->where('id_galeri', $id_galeri);
		$ambil = $this->db->get('galeri');
		$data = $ambil->row_array();

		return $data;
	}

	function tambah($inputan)
	{
		$config['upload_path']    = './assets/img/galeri/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 2048;
		$config['width']       = 933;
		$config['height']       = 407;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$this->db->insert('galeri',$inputan);
		}
		else
		{
			$inputan['foto'] = $this->upload->data('file_name');
			$this->db->insert('galeri',$inputan);
		}
	}

	function ubah($inputan,$id_galeri) 
	{
		$galeri = $this->ambil_galeri($id_galeri);

		$config['upload_path'] = './assets/img/galeri/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$config['width'] = 933;
		$config['height'] = 407;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$this->db->where('id_galeri', $id_galeri);
			$this->db->update('galeri', $inputan);
		}

		if ($this->upload->do_upload('foto'))
		{
			$inputan['foto'] = $this->upload->data('file_name');
			$foto = $galeri['foto'];

			if(file_exists("./assets/img/galeri/$foto"))
			{
				unlink("./assets/img/galeri/$foto");
			}

			$this->db->where('id_galeri',$id_galeri);
			$this->db->update('galeri',$inputan);
		}
	}

	function hapus($id_galeri) 
	{
		$galeri = $this->ambil_galeri($id_galeri);

		$foto = $data['foto'];
		unlink("./assets/img/galeri/$foto");
		$this->db->where('id_galeri', $id_galeri);
		$this->db->delete('galeri'); 
	}

}

/* End of file Mgaleri.php */
/* Location: ./application/models/Mgaleri.php */