<?php


	class C_Pelanggan extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_Pelanggan');
			$this->load->library('session');
			date_default_timezone_set("Asia/Bangkok");
			$is_logged = $this->session->userdata('id_pelanggan');
			if (!$is_logged) {
				$this->session->set_flashdata('gagal','Mohon Login Terlebih Dahulu !');
				redirect('C_Login', 'refresh');
			}
		}

		public function index(){
			$data['barang'] = $this->M_Pelanggan->getBarang();

			$id = $this->session->userdata('id_pelanggan');
			$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id);
			$this->load->view('Pelanggan/template/header',$dataChat);
			$this->load->view('Pelanggan/V_Menu_Utama',$data);
			$this->load->view('Pelanggan/template/footer');
		}

		public function tampilPulsa(){
			$id = $this->session->userdata('id_pelanggan');
			$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id);
			$this->load->view('Pelanggan/template/header',$dataChat);
			$this->load->view('Pelanggan/V_Menu_Pulsa');
			$this->load->view('Pelanggan/template/footer');
		}

		

		public function transPulsa(){

			$data=array(
				'id_transpulsa' => self::getIdPulsa(),
				'no_hp' => $this->input->post('nomor'),
				'total_harga' => $this->input->post('total'),
				'jumlah_saldo' => $this->input->post('saldo'),
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'status' => 0,
				'metode_bayar' => $this->input->post('metode_bayar')

			);
			if($this->M_Pelanggan->beliPulsa($data)){
				$this->session->set_flashdata('status','success');
				redirect('C_Pelanggan');
			}
		}

		public function beliKuota(){
			$data = array(
				'id_kuota' => $this->input->post('id_kuota'),
				'nama_provider' => $this->input->post('nama_provider'),
			);
		}

		public function getIdPulsa(){
			return "ITP-".rand(1000,100000);
		}

		public function keranjang($id_pelanggan){
			$data['barang'] = $this->M_Pelanggan->getDataKeranjang($id_pelanggan);
			$id = $this->session->userdata('id_pelanggan');
			$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id);
			$this->load->view('Pelanggan/template/header',$dataChat);
			$this->load->view('Pelanggan/V_Keranjang',$data);
			$this->load->view('Pelanggan/template/footer');
		}

		public function updateBarang(){
			$id = $this->input->post('id');
			$id_barang = $this->input->post('id_barang');
			$jumlah_barang = $this->input->post('jumlah_barang');

			$data = array(
				'id' => $id,
				'id_barang' => $id_barang,
				'jumlah_barang' => $jumlah_barang,

			);



			$data1 = $this->M_Pelanggan->updateBarang($data);
			echo json_encode($data1);
		}

		public function tampilPerdana(){
			$data['barang'] = $this->M_Pelanggan->getPerdana();
			$id = $this->session->userdata('id_pelanggan');
			$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id);
			$this->load->view('Pelanggan/template/header',$dataChat);
			$this->load->view('Pelanggan/V_Menu_Perdana',$data);
			$this->load->view('Pelanggan/template/footer');
		}

		public function tampilProviderKuota(){
			$data['detail_kuota'] = $this->M_Pelanggan->getDetailKuota();
			$data['kuota'] = $this->M_Pelanggan->getKuota();
			$id = $this->session->userdata('id_pelanggan');
			$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id);
			$this->load->view('Pelanggan/template/header',$dataChat);
			$this->load->view('Pelanggan/Kuota', $data);
			$this->load->view('Pelanggan/template/footer');
		}

		public function checkout(){
			$id = $this->input->post('id');
			$metode = $this->input->post('metode_bayar');

			$dt = $this->M_Pelanggan->getTransaksiByID($id);
			$jumlah = $dt['jumlah_barang'];
			$id_barang = $dt['id_barang'];
			$id_pelanggan = $this->session->userdata('id_pelanggan');

			$db = $this->M_Pelanggan->getBarangByID($id_barang);
			$sisa_stock = $db['stock'] - $jumlah;

			if(!$this->M_Pelanggan->checkBarang($jumlah,$id_barang)){
				$this->session->set_flashdata('kurang',"Maaf Transaksi Tidak Bisa Dilakukan Karena Stock Barang tidak cukup ! Stock Hanya Tersisa = " . $db['stock']);
				return redirect('C_Pelanggan/keranjang/'.$id_pelanggan);
			}



			$data = array(
 
				'id_transaksi' => $this->getIDTK(),
				'id_pelanggan' => $id_pelanggan,
				'tanggal_transaksi' => date('Y-m-d'),
				'status' => 1 ,
				'metode_bayar' => $metode


			);


			$data2 = array(

				'stock' => $sisa_stock,

			);
			$dataKeranjang = $this->M_Pelanggan->updateKeranjang($id,$data);
			$dataBarang = $this->M_Pelanggan->updateBarangByID($id_barang,$data2);

			if($dataKeranjang && $dataBarang){
				$this->session->set_flashdata('checkoutBerhasil',"Transaksi Berhasil Dilakukan !");
				return redirect('C_Pelanggan/keranjang/'.$id_pelanggan);
			}
			
			return redirect('C_Pelanggan/keranjang/'.$id_pelanggan);

		}

		public function checkoutAll(){
			$id_pelanggan = $this->session->userdata('id_pelanggan');
			$metode = $this->input->post('metode_bayar');
			$data1 = array(
				'id_transaksi' => $this->getIDTK(),
				'tanggal_transaksi' => date('Y-m-d'),
				'status' => 1,
				'metode_bayar' => $metode
			);

			$data = $this->M_Pelanggan->checkoutAll($id_pelanggan,$data1);

			$this->session->set_flashdata('checkoutBerhasil',"Transaksi Berhasil Dilakukan !");
			return redirect('C_Pelanggan/keranjang/'.$id_pelanggan);
		}
		
		public function tampilAksesoris(){
			$data['jenis'] = $this->M_Pelanggan->getJenisAksesoris();
			$data['aksesoris'] = $this->M_Pelanggan->getAksesoris();
			$id = $this->session->userdata('id_pelanggan');
			$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id);
			$this->load->view('Pelanggan/template/header',$dataChat);
			$this->load->view('Pelanggan/V_Aksesoris',$data);
			$this->load->view('Pelanggan/template/footer',$dataChat);
		}

		public function sortAksesoris($jenis){
			$jenis = urldecode($this->uri->segment(3));
			$data['jenis'] = $this->M_Pelanggan->getJenisAksesoris();
			$data['aksesoris'] = $this->M_Pelanggan->getSortAksesoris($jenis);
			$this->load->view('Pelanggan/template/header');
			$this->load->view('Pelanggan/V_Aksesoris',$data);
		}


		public function tambahKeranjang(){


		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$jumlah_barang = 1;
		$total_harga = $this->input->post('harga_barang');
		$tanggal_transaksi = date('Y-m-d');
		$status = 0;
		$id_barang = $this->input->post('id_barang');

		if($checkData = $this->M_Pelanggan->checkKeranjang($id_pelanggan,$id_barang)){
			

			if(!$this->M_Pelanggan->checkStock($id_barang,$jumlah_barang)){
				$this->session->set_flashdata('gagal','Gagal Menambah Kedalam Keranjang Karena Stock Tidak Mencukupi');
				return redirect('C_Pelanggan');
			}

			$id = $checkData['id'];

			$jumlah_barang = $checkData['jumlah_barang'] + 1;


			$db = $this->M_Pelanggan->getBarangByID($id_barang);
			$total_harga = $db['harga'] * $jumlah_barang;
			$sisa_stock = $db['stock'] - 1;			

			$data = array(
				'total_harga' => $total_harga,
				'jumlah_barang' => $jumlah_barang,
			);

			$dataBarang = array(
				'stock' => $sisa_stock,
			);


			$aksiKeranjang = $this->M_Pelanggan->updateKeranjang($id,$data);
			$aksiBarang = $this->M_Pelanggan->updateBarangByID($id_barang,$dataBarang);
			if($aksiKeranjang && $aksiBarang){
				$this->session->set_flashdata('status','success');
				redirect('C_Pelanggan');
			}

		}else{

			if(!$this->M_Pelanggan->checkStock($id_barang,$jumlah_barang)){
				$this->session->set_flashdata('gagal','Gagal Menambah Kedalam Keranjang Karena Stock Tidak Mencukupi');
				return redirect('C_Pelanggan');
			}

			$data = array(
                'id_transaksi' => '1',
				'id_pelanggan' => $id_pelanggan,
				'id_barang' => $id_barang,
				'jumlah_barang' => $jumlah_barang,
				'total_harga' => $total_harga,
				'tanggal_transaksi' => $tanggal_transaksi,
				'metode_bayar' => '1',
				'status' => $status
	
			);


			$db = $this->M_Pelanggan->getBarangByID($id_barang);
			$sisa_stock = $db['stock'] - 1;	

			$dataBarang = array(
				'stock' => $sisa_stock,
			);


			$aksiKeranjang = $this->M_Pelanggan->tambahKeranjang($data);
			$aksiBarang = $this->M_Pelanggan->updateBarangByID($id_barang,$dataBarang);
	
			if($aksiKeranjang && $aksiBarang){
				$this->session->set_flashdata('status','success');
				redirect('C_Pelanggan');
			}
	
	
		}


	}

	public function insertTransaksiKuota(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$id_detail_kuota = $this->input->post('id_detail_kuota');
		$nomor_hp = $this->input->post('no_hp');
		$metode_bayar = $this->input->post('metode_bayar');
		
		$data = array(
			'id_transaksi_kuota' => $this->getIDTK(),
			'id_pelanggan' => $id_pelanggan,
			'id_detail_kuota' => $id_detail_kuota,
			'no_hp' => $nomor_hp,
			'status' => 0 ,
			'metode_bayar' => $metode_bayar
		);
		$this->session->set_flashdata('transaksi',"Berhasil Membeli Kuota !");
		if($this->M_Pelanggan->insertTransaksiKuota($data)){
			redirect('C_Pelanggan/tampilProviderKuota');
		}
	}

	public function getIDTK(){
		return "TK-".date('Y-m-d-H-i-s');
	}


	public function getTotalHarga(){
		$idpelanggan = $this->input->post('id_user');
		$dataT = $this->M_Pelanggan->getTotalHarga($idpelanggan);
		$data = array(

			'status' => true,
			'total' => $dataT['total'],

		);

		echo json_encode($data);
		
	}

	public function batalPesanan(){
		$id = $this->input->post("id");
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data = $this->M_Pelanggan->pesananBatal($id);

		$this->session->set_flashdata('checkoutBerhasil',"Berhasil Membatalkan Pesanan !!");
		if($data){
			redirect('C_Pelanggan/keranjang/'.$id_pelanggan);
		}

		echo json_encode($data);

	}

	public function insertChat(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		
		$path = './upload/chat/folder-'.$id_pelanggan;
		
		if (!empty($_FILES['file']['name'])) {
		
			if (!is_dir($path)) {
				mkdir($path);
			}
			$config['upload_path'] = './upload/chat/folder-'.$id_pelanggan;
			$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
			$config['file_name'] = time().'-'.date("Y-m-d").'-'.$_FILES['file']['name'];
			$config['overwrite'] = true;
			$config['max_size'] = 12024;

			$this->load->library('upload',$config);

			if(! $this->upload->do_upload('file')){
				echo $this->upload->display_errors();
			}else{
				$file = $this->upload->data();
				$isi = $this->input->post('isi');
				$files = $file['file_name'];
				$data = array(
					'isi' => $isi,
					'send_from' => $id_pelanggan,
					'send_to' => 1,
					'lampiran' => $files,
					'tgl_chat' =>date('Y-m-d'),	

				);

				if($this->M_Pelanggan->insertChat($data)){
					return redirect("C_Pelanggan/");
				}
			}
		}else{

			$isi = $this->input->post('isi');
			$data = array(
				'isi' => $isi,
				'send_from' => $id_pelanggan,
				'send_to' => 1,
				'tgl_chat' =>date('Y-m-d'),	
				);
			if($this->M_Pelanggan->insertChat($data)){
				return redirect("C_Pelanggan/");
			}

		}



		
	}

	public function tampilRiwayat(){
		
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['diterima'] = $this->M_Pelanggan->ambilTransaksi($id_pelanggan,2);
		$data['menunggu'] = $this->M_Pelanggan->ambilTransaksi($id_pelanggan,1);


		$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id_pelanggan);
		$this->load->view('Pelanggan/template/header',$dataChat);
		$this->load->view('Pelanggan/V_TampilRiwayat',$data);
		$this->load->view('Pelanggan/template/footer');
	}

	public function tampilRiwayatKuota(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['diterima'] = $this->M_Pelanggan->ambilTransaksiKuota($id_pelanggan,1);
		$data['menunggu'] = $this->M_Pelanggan->ambilTransaksiKuota($id_pelanggan,0);


		$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id_pelanggan);
		$this->load->view('Pelanggan/template/header',$dataChat);
		$this->load->view('Pelanggan/V_TampilRiwayatKuota',$data);
		$this->load->view('Pelanggan/template/footer');
	}

	public function tampilRiwayatPulsa(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['diterima'] = $this->M_Pelanggan->ambilTransaksiPulsa($id_pelanggan,1);
		$data['menunggu'] = $this->M_Pelanggan->ambilTransaksiPulsa($id_pelanggan,0);


		$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id_pelanggan);
		$this->load->view('Pelanggan/template/header',$dataChat);
		$this->load->view('Pelanggan/V_TampilRiwayatPulsa',$data);
		$this->load->view('Pelanggan/template/footer');
	}	

	public function cetakStruk($id_transaksi){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['transaksi'] = $this->M_Pelanggan->cetakStruk($id_transaksi);
		$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id_pelanggan);
		$this->load->view('Pelanggan/template/header',$dataChat);
		$this->load->view('Pelanggan/V_cetakStruk',$data);
		$this->load->view('Pelanggan/template/footer');
	}

	public function cetakStrukPulsa($id_transpulsa){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['transaksi'] = $this->M_Pelanggan->cetakStrukPulsa($id_transpulsa);
		$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id_pelanggan);
		$this->load->view('Pelanggan/template/header',$dataChat);
		$this->load->view('Pelanggan/V_cetakStrukPulsa',$data);
		$this->load->view('Pelanggan/template/footer');
	}

	public function cetakStrukKuota($id_transaksi_kuota){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['transaksi'] = $this->M_Pelanggan->cetakStrukKuota($id_transaksi_kuota);
		$dataChat['chat'] = $this->M_Pelanggan->getDataChat($id_pelanggan);
		$this->load->view('Pelanggan/template/header',$dataChat);
		$this->load->view('Pelanggan/V_cetakStrukKuota',$data);
		$this->load->view('Pelanggan/template/footer');
	}


}



?>