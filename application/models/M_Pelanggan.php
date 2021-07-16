<?php



	class M_Pelanggan extends CI_Model{

		public function __construct() {
			$this->load->database();
			$this->load->library('encryption');
		}

		public function getBarang(){



			$this->db->select("*");
			$this->db->from("tb_barang");
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function getDataKeranjang($id_pelanggan){
			$this->db->select("*");
			$this->db->from("tb_transaksi transaksi");
			$this->db->join('tb_barang barang', 'barang.id_barang = transaksi.id_barang');
			$this->db->where("id_pelanggan",$id_pelanggan);
			$this->db->where("status",0);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function checkKeranjang($id_pelanggan,$id_barang){
			$this->db->select("*");
			$this->db->from("tb_transaksi");
			$this->db->where("id_pelanggan",$id_pelanggan);
			$this->db->where("id_barang",$id_barang);
			$this->db->where("status",0);
			$data = $this->db->get();
			if($data->num_rows()>0){
				$row = $data->row_array();
				return $row;
			}else{
				return false;
			}
		}

		//bagian rendy
		public function getPerdana(){
			$this->db->select("*");
			$this->db->from("tb_barang");
			$this->db->where('ID_Kategori', 3);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function getProviderKuota(){
			$this->db->select("*");
			$this->db->from("tb_barang");
			$this->db->where('ID_Kategori', 2);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		//rendy sampe sini

		public function getKuota(){
			$this->db->select("*");
			$this->db->from("tb_kuota");
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function getDetailKuota(){
			$this->db->select("*");
			$this->db->from("tb_detail_kuota");
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function getAksesoris(){
			$this->db->select("*");
			$this->db->from("tb_barang");
			$this->db->where('id_kategori',4);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function getSortAksesoris($jenis){
			$this->db->select("*");
			$this->db->from("tb_barang");
			$this->db->where('id_kategori',4);
			$this->db->where('jenis_barang',$jenis);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function getJenisAksesoris(){
			$this->db->distinct();
			$this->db->select("jenis_barang");
			$this->db->from("tb_barang");
			$this->db->where('id_kategori',4);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function checkBarang($jumlah,$id_barang){
			$this->db->select("*");
			$this->db->from("tb_barang");
			$this->db->where('id_barang',$id_barang);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				$row = $data->row_array();
				if($jumlah <= $row['stock']){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public function beliPulsa($data){
				return $this->db->insert('tb_transaksi_pulsa',$data);
		}
		public function tambahKeranjang($data){
			return $this->db->insert('tb_transaksi',$data);
		}
		public function insertTransaksiKuota($data){
			return $this->db->insert('tb_transaksi_kuota',$data);
		}

		public function updateKeranjang($id,$data){
			$this->db->where('id',$id);
			return $this->db->update('tb_transaksi',$data);
		}


		public function getBarangByID($id_barang){
			$data = $this->db->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'  ");
			$row = $data->row_array();
			return $row;
		}

		public function checkStock($id_barang,$jumlah_barang){
			$this->db->select('*');
			$this->db->from('tb_barang');
			$this->db->where('id_barang',$id_barang);
			$data = $this->db->get();
			$row = $data->row_array();

			if($row['stock'] < $jumlah_barang){
				return false;
			}

			return true;

		}

		public function getTransaksiByID($id){
			$this->db->select("*");
			$this->db->from('tb_transaksi');
			$this->db->where('id',$id);
			$data = $this->db->get();
			$row = $data->row_array();
			return $row;

		}

		public function updateBarangByID($id_barang,$data){
			$this->db->where('id_barang',$id_barang);
			return $this->db->update('tb_barang',$data);
		}

		public function updateBarang($data){

			$id = $data['id'];
			$id_barang = $data['id_barang'];
			$jumlah_barang = $data['jumlah_barang'];
			$query = $this->db->query("SELECT * FROM tb_barang WHERE id_barang = '$id_barang' ");
			$row = $query->row_array();

			if($this->checkBarang($jumlah_barang,$id_barang)){


				$sisa_stock = $row['stock'] - $jumlah_barang;
				$total_harga = $row['harga'] * $jumlah_barang;

				$this->db->where('id',$id);
				$data1 = array(
					'total_harga' => $total_harga,
					'jumlah_barang' => $jumlah_barang

				);



				$this->db->update('tb_transaksi',$data1);			
				return $total_harga;
			}else{
				$data = array(

					'kurang' => "stock data kurang",
					'stock' => $row['stock'],

				);
				return $data;
			}

		}

		public function checkoutAll($id_pelanggan,$data){

			$query = $this->db->query("SELECT * FROM tb_transaksi WHERE id_pelanggan = '$id_pelanggan' AND status ='0' ");
			$dataTransaksi = $query->result_array();

			foreach($dataTransaksi as $data1){
				$id_barang = $data1['id_barang'];
				$jumlah_barang = $data1['jumlah_barang'];

				$dataBarang = $this->getBarangByID($id_barang);
				$sisa_stock = $dataBarang['stock'] - $jumlah_barang;

				$db = array(

					'stock' => $sisa_stock,

				);

				$this->updateBarangByID($id_barang,$db);
			}

			$this->db->where('id_pelanggan',$id_pelanggan);
			$this->db->where('status',0);
			return $this->db->update('tb_transaksi',$data);
		}

		public function getTotalHarga($id_pelanggan){
			$query = $this->db->query("SELECT SUM(total_harga) as total FROM tb_transaksi WHERE status='0' AND id_pelanggan='$id_pelanggan' ");
			$row = $query->row_array();
			return $row;
		}

		public function pesananBatal($id){
			$this->db->where('id', $id);
        	return $this->db->delete('tb_transaksi');
		}

		public function getDataChat($id_pelanggan){
			$this->db->select("*");
			$this->db->from("tb_chat");
			$this->db->where('send_from',$id_pelanggan);
			$this->db->or_where('send_to',$id_pelanggan);
			$data = $this->db->get();
			$result = $data->result_array();
			return $result;
		}

		public function insertChat($data){
			return $this->db->insert('tb_chat',$data);
		}

		public function ambilTransaksi($id_pelanggan,$status){
			$query = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang WHERE id_pelanggan='$id_pelanggan' AND status='$status'  ");
			$data = $query->result_array();
			return $data;
		}

		public function ambilTransaksiKuota($id_pelanggan,$status){
			$query = $this->db->query("SELECT *,tb_detail_kuota.jumlah_kuota,tb_detail_kuota.masa_aktif,tb_detail_kuota.harga_kuota FROM tb_transaksi_kuota INNER JOIN tb_detail_kuota ON tb_transaksi_kuota.id_detail_kuota = tb_detail_kuota.id_detailkuota WHERE status = '$status' AND id_pelanggan ='$id_pelanggan' ");
			$data = $query->result_array();
			return $data;
		}		

		public function ambilTransaksiPulsa($id_pelanggan,$status){
			$query = $this->db->query("SELECT * FROM tb_transaksi_pulsa WHERE id_pelanggan='$id_pelanggan' AND status='$status'  ");
			$data = $query->result_array();
			return $data;
		}
		

		public function cetakStruk($id_transaksi){
			$query = $this->db->query("SELECT *,nama_barang  FROM tb_transaksi INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang WHERE id_transaksi='$id_transaksi' ");
			$data = $query->result_array();
			return $data;
		}

		public function cetakStrukPulsa($id_transpulsa){
			$query = $this->db->query("SELECT * FROM tb_transaksi_pulsa WHERE id_transpulsa = '$id_transpulsa' ");
			$data = $query->result_array();
			return $data;
		}	

		public function cetakStrukKuota($id_transaksi_kuota){
			$query = $this->db->query("SELECT *,tb_detail_kuota.jumlah_kuota,tb_detail_kuota.masa_aktif,tb_detail_kuota.harga_kuota FROM tb_transaksi_kuota INNER JOIN tb_detail_kuota ON tb_transaksi_kuota.id_detail_kuota = tb_detail_kuota.id_detailkuota WHERE id_transaksi_kuota ='$id_transaksi_kuota' ");
			$data = $query->result_array();
			return $data;
		}		

	}


?>