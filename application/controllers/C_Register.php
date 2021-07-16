<?php


	class C_Register extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('M_Register');
		}


		public function index(){
			// $this->load->view('Pelanggan/header');
			// $this->load->view('Pelanggan/Register');
			$this->load->view('V_daftar');
		}


		public function daftarPelanggan(){
			$nama = $this->input->post('Nama_Pelanggan');
			$reg['nama'] = $nama;
			$alamat = $this->input->post('Alamat_Pelanggan');
			$reg['alamat'] = $alamat;			
			$nohp = $this->input->post('NoHp_Pelanggan');
			$email = $this->input->post('Email');				
			$username = $this->input->post('Username');

			if($this->M_Register->getNoHpPelanggan($nohp)){
				$this->session->set_flashdata('nohp','No hp Sudah Terpakai !');
				$reg['nohp'] = $nohp;
			}						

						
			if($this->M_Register->getEmailPelanggan($email)){
				$this->session->set_flashdata('email','Email Sudah Terpakai !');
				$reg['email'] = $email;
			}			

			
			
			if($this->M_Register->getUserPelanggan($username)){
				$this->session->set_flashdata('username','Username Sudah Terpakai !');
				$reg['username'] = $username;				
			}

			$password1 = $this->input->post('Password');
			$password2 = $this->input->post('Password2');

			if($password1 != $password2){
				$this->session->set_flashdata('password','field Password harus sama !');
				$reg['password'] = "password";
			}

			if(isset($reg['nohp']) || isset($reg['email']) || isset($reg['username']) || isset($reg['username']) ){
				return $this->load->view('V_daftar',$reg);
			}

			$password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);

			$data = array(
				'Nama_Pelanggan' => $nama,
				'Alamat_Pelanggan' => $alamat,
				'NoHp_Pelanggan' => $nohp,
				'Email' => $email,
				'Username' => $username,
				'Password' => $password,
			);
			$this->M_Register->inputPelanggan($data);
			redirect("C_Login");
		}
			
		public function submitRegister(){
			$namaAdmin = $this->input->post('nama');
			$emailAdmin = $this->input->post('email');
			$usernameAdmin = $this->input->post('username');
			$passwordAdmin = $this->input->post('password');

			$data = array(

				'nama_admin' => $namaAdmin,
				'email' => $emailAdmin,
				'username_admin' => $usernameAdmin,
				'password_admin' => $passwordAdmin,

			);

			$this->M_Register->inputRegister($data);

		}

		public function RegisterAdmin(){

		}

		public function RegisterPelanggan(){

		}


	}

?>