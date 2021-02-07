<?php 

function get_setting($nama_kolom)
{
	// panggil instance CI
	$CI =& get_instance();

	$CI->db->select($nama_kolom);
	$ambil = $CI->db->get('pengaturan');
	$data = $ambil->row_array();
	return $data[$nama_kolom];
}