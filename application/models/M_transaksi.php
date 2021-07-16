 <?php
	class M_transaksi extends CI_Model {

		public function __construct() {
			$this->load->database();
			//$this->load->library('encryption');
		}


		public function get(){

			$this->db->from('tb_transaksi');
			$this->db->where('status',1);
			$query = $this->db->get();
			return $query;
		}

		public function updateTransaksi($id_transaksi){

        	$this->db->where('id_transaksi',$id_transaksi);
        	$data = array(
        		'status' => 2,
        	);
       		return $this->db->update('tb_transaksi',$data);
		}
		

	}
?>