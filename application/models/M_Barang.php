<?php


	class M_Barang extends CI_Model{


		public function __construct(){
			$this->load->database();
		}


		public function get($id = null)
		{
			$this->db->from('tb_barang');
			if($id != null){
				$this->db->where('id_barang', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function getKategori(){
			$this->db->select('*');
			$this->db->from('tb_kategori');
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function insert($data){
			return $this->db->insert('tb_barang',$data);
		}

		public function hapusData($id){
			$this->db->where('id_barang',$id);
			return $this->db->delete('tb_barang');
		}


		public function updateBarang($where,$table){
			return $this->db->get_where($table,$where);
		}

		public function updateData($id_barang,$data){
        	$this->db->where('id_barang',$id_barang);
       	 return $this->db->update('tb_barang',$data);
		}
	}
?>
