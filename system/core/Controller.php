<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	// buat atribut meta
	public $meta_title;
	public $meta_description;
	public $meta_keyword;
	public $meta_url;
	
	// buat atribut analytic
	public $visitor_today;
	public $total_visitors;
	public $online_visitors;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');

		// panggil
		$this->set_meta();
		$this->analytic();
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	public function set_meta()
	{
		$this->meta_title();
		$this->meta_description();
		$this->meta_keyword();
		$this->meta_url();
	}

	public function meta_title($param = null)
	{
		$this->meta_title = ($param == null ? get_setting('meta_title') : $param);
	}

	public function meta_description($param = null)
	{
		$this->meta_description = ($param == null ? get_setting('meta_description') : $param);
	}

	public function meta_keyword($param = null)
	{
		$this->meta_keyword = ($param == null ? get_setting('meta_keyword') : $param);
	}

	public function meta_url()
	{
		$this->meta_url = current_url();
	}

	public function analytic()
	{	
		$kecuali = array('admin', 'assets');


		$this->load->library('user_agent');

		$ip = $this->input->ip_address(); // mendapatkan ip user
		$platform = $this->agent->platform();
		$browser = $this->agent->browser();
		$date = date('Y-m-d');
		$online = time();
		$url = $_SERVER['REQUEST_URI'];

		// cek berdasarkan ip, date dan url; apakah user sudah pernah mengakses hari ini
		$query_check = $this->db->query("SELECT * FROM analytic WHERE ip='$ip' AND date='$date' AND url='$url'")->num_rows();
		$check = isset($query_check)?($query_check):0;

		// jika nilai hasil dari pengecekan 0, maka simpan data pengunjung ke tb analytic
		if ($check == 0) {
			$this->db->query("INSERT INTO analytic (ip,platform,browser,date,hits,online,url) VALUES ('$ip', '$platform', '$browser', '$date', '1', '$online', '$url' )");
		}

		// jika sudah ada, maka update
		else{
			$this->db->query("UPDATE analytic SET hits =  hits + 1, online='$online' WHERE ip='$ip' AND date='$date' AND url='$url' ");
		}

		// hitung jumlah pengunjung
		$visitor_today = $this->db->query("SELECT * FROM analytic WHERE date='$date' GROUP BY ip")->num_rows();
		$db_visitors = $this->db->query("SELECT COUNT(hits) AS hits FROM analytic")->row();

		// menghitung total pengunjung
		$total_visitors = isset($db_visitors->hits)?($db_visitors->hits):0;

		$deadline = time() - 300;

		// hitung pengunjung yang online
		$online_visitors = $this->db->query("SELECT * FROM analytic WHERE online > '$deadline' GROUP BY ip")->num_rows();

		$this->visitor_today = $visitor_today;
		$this->total_visitors = $total_visitors;
		$this->online_visitors = $online_visitors;
	}

}
