<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function index()
	{
		$this->load->view('pengunjung/url_not_found');
	}

}

/* End of file Notfound.php */
/* Location: ./application/controllers/Notfound.php */