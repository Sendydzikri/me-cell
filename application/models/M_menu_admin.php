<?php
	class M_menu_admin extends CI_Model {

		public function __construct() {
			$this->load->database();
			$this->load->library('encryption');
		}
	}
?>