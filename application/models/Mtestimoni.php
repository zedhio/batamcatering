<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtestimoni extends CI_Model {

	function tampil() 
	{
		$this->db->order_by('id_testimoni', 'DESC');
		$ambil = $this->db->get('testimoni');
		$data = $ambil->result_array();
		return $data;
	}

	function ambil_testimoni($id_testimoni) 
	{
		$this->db->where('id_testimoni', $id_testimoni);
		$ambil = $this->db->get('testimoni');
		$data = $ambil->row_array();

		return $data;
	}

	function tambah($inputan)
	{
		$config['upload_path']    = './assets/img/testimoni/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 2048;
		$config['width']       = 933;
		$config['height']       = 407;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$this->db->insert('testimoni',$inputan);
		}
		else
		{
			$inputan['foto'] = $this->upload->data('file_name');
			$this->db->insert('testimoni',$inputan);
		}
	}

	function ubah($inputan,$id_testimoni) 
	{
		$testimoni = $this->ambil_testimoni($id_testimoni);

		$config['upload_path'] = './assets/img/testimoni/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$config['width'] = 933;
		$config['height'] = 407;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$this->db->where('id_testimoni', $id_testimoni);
			$this->db->update('testimoni', $inputan);
		}

		if ($this->upload->do_upload('foto'))
		{
			$inputan['foto'] = $this->upload->data('file_name');
			$foto = $testimoni['foto'];

			if(file_exists("./assets/img/testimoni/$foto"))
			{
				unlink("./assets/img/testimoni/$foto");
			}

			$this->db->where('id_testimoni',$id_testimoni);
			$this->db->update('testimoni',$inputan);
		}
	}

	function hapus($id_testimoni) 
	{
		$testimoni = $this->ambil_testimoni($id_testimoni);

		$foto = $data['foto'];
		unlink("./assets/img/testimoni/$foto");
		$this->db->where('id_testimoni', $id_testimoni);
		$this->db->delete('testimoni'); 
	}

}

/* End of file Mtestimoni.php */
/* Location: ./application/models/Mtestimoni.php */