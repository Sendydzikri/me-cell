<?php
class C_login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('M_login');
		date_default_timezone_set("Asia/Bangkok");

	}


	public function index() {
		$is_logged = $this->session->userdata('id_pelanggan');
        if ($is_logged) {
            redirect('C_Pelanggan', 'refresh');
        }  
		$this->load->view("V_Login");
		// $this->load->view("V_Footer");
	}


	public function loginAdmin(){
		$this->load->view("V_LoginAdmin");
		$is_logged = $this->session->userdata('id_admin');
        if ($is_logged) {
            redirect('C_Admin', 'refresh');
        }  		
	}

	public function loginKasir(){
		$is_logged = $this->session->userdata('id_kasir');
        if ($is_logged) {
            redirect('C_Kasir', 'refresh');
        }  		
		$this->load->view("Kasir/V_LoginKasir");
	}

	public function tambahAkun(){
		$this->M_Admin->createAdmin();
	}

	public function aksi_login_admin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->M_login->checkUser($username,$password);

		if($data['stat'] == true){
			$dataLogin = array(
				'id_admin' => $data['id_admin'],
				'username' => $data['username_admin'],
				'status' => "logged",

			);

			$this->session->set_userdata($dataLogin);
			$this->session->set_flashdata('logged',$username);
			redirect("C_Admin");
		}else{
			$this->session->set_flashdata('gagal','Password atau username anda salah !');
				redirect("C_Login/loginAdmin");
		}		
	}
  
	public function aksi_login_kasir(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->M_login->checkUserKasir($username,$password);


		if($data['stat'] == true){
			$dataLogin = array(
				'id_kasir' => $data['id_kasir'],
				'username' => $data['username_kasir'],
				'status' => "logged",

			);

			$this->session->set_userdata($dataLogin);
			$this->session->set_flashdata('logged',$username);
			redirect("C_Kasir");
		}else{
			$this->session->set_flashdata('gagal','Password atau username anda salah !');
				redirect("C_Login/loginKAsir");
		}		
	}
	public function login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->M_login->checkPelanggan($username,$password);
		

		if($data['stat'] == true){
				$id_pelanggan = $data['id_pelanggan'];
				$dataLogin = array(
					'id_pelanggan' => $id_pelanggan,
					'username' => $username,
					'status' => "logged",

				);

				$this->session->set_userdata($dataLogin);
				$this->session->set_flashdata('logged',$username);
				redirect("C_Pelanggan");
		}else{
				$this->session->set_flashdata('gagal','Password atau username anda salah !');
				redirect("C_Login");		
		}

	}


	public function logout(){
		if($this->session->userdata('id_pelanggan')){
			$this->session->sess_destroy();
			redirect('C_Login','refresh');
		}else if($this->session->userdata('id_admin')){
			$this->session->sess_destroy();
			redirect('C_Login/loginAdmin','refresh');
		}else if($this->session->userdata('id_kasir')){
	       $this->session->sess_destroy();		    
			redirect('C_Login/loginKasir','refresh');
		}else{
			redirect('C_Login','refresh');
		}
		
	}



}



