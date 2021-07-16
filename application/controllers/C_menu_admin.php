<?php
class C_menu_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('M_menu_admin');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {

		$this->load->view("admin/menu_admin");
		// $this->load->view("V_Footer");
	}
}
?>