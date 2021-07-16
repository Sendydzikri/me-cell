<?php


	class M_Register extends CI_Model{

		function __construct(){
			$this->load->database();		
		}

		public function inputRegister($data){
			$this->db->insert('tb_admin',$data);
		}

		public function inputPelanggan($data){
			$this->db->insert('tb_pelanggan',$data);
		}
	
	public function getUserPelanggan($username){
			$this->db->where('username',$username);
			$data = $this->db->get('tb_pelanggan');	
			$data = $data->result_array();				

			if(count($data) > 0){
				return 1;
			}else{
				return 0;
			}		
		}

	public function getEmailPelanggan($email){
			$this->db->where('email',$email);
			$data = $this->db->get('tb_pelanggan');	
			$data = $data->result_array();				

			if(count($data) > 0){
				return 1;
			}else{
				return 0;
			}		
	}
	public function getNoHpPelanggan($nohp){
			$this->db->where('NoHp_Pelanggan',$nohp);
			$data = $this->db->get('tb_pelanggan');	
			$data = $data->result_array();	

			if(count($data) > 0){
				return 1;
			}else{
				return 0;
			}	
	}		

}	



?>