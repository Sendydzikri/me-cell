<?php
class C_transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->library('encryption');
		// $this->load->library('session');
		 $this->load->helper('url');
		 $this->load->model('M_transaksi');
		// date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {
		$data['row'] = $this->M_transaksi->get();
		$this->load->view("V_KelolaTransaksi",$data);

		// $this->load->view("V_Footer");
	}



	

}
?>


