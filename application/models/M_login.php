<?php
	class M_login extends CI_Model {

		public function __construct() {
			$this->load->database();
			$this->load->library('encryption');
		}

  
		public function checkUser($username,$password){


			$this->db->where('username_admin',$username);
			$data = $this->db->get('tb_admin');
            $row = $data->row_array();

            if(password_verify($password, $row['password_admin'])){
            	$row['stat'] = true;
                return $row;
            }else{
            	$stat['stat'] = false;
                return $stat;
            }
		}
 
		public function checkUserKasir($username,$password){


			$this->db->where('username_kasir',$username);
			$data = $this->db->get('tb_kasir');
            $row = $data->row_array();

            if(password_verify($password, $row['password_kasir'])){
            	$row['stat'] = true;
                return $row;
            }else{
            	$stat['stat'] = false;
                return $stat;
            }


		}


		public function checkPelanggan($username,$password){
			$this->db->where('username',$username);
			$data = $this->db->get('tb_pelanggan');
            $row = $data->row_array();

            if(password_verify($password, $row['password'])){
            	$row['stat'] = true;
                return $row;
            }else{
            	$stat['stat'] = false;
                return $stat;
            }
		}
	}

?>