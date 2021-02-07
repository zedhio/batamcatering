<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// class Dompdf_gen {
// 	public function __construct() {
// 		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
// 		$pdf = new DOMPDF();
// 		$CI =& get_instance();
// 		$CI->dompdf = $pdf;
// 	}
// }

require_once APPPATH.'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Pdf extends Dompdf    
{
	public function __construct()
	{
		parent::__construct();      
		$dompdf = new Dompdf(); 
	}
}
?>