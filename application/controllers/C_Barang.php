<?php
class C_Barang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url','form','string');
		$this->load->model('M_Barang');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {
		$data['row'] = $this->M_Barang->get();
		$this->load->view('Admin/header');
		$this->load->view("Admin/kelolabarang",$data);
		$this->load->view('Admin/footer');
	}

	public function aksi_tambah(){

		$config['upload_path'] = './upload/barang/';
		$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
		$config['file_name'] = time().'-'.date("Y-m-d").'-'.$_FILES['file']['name'];
		$config['overwrite'] = true;
		$config['max_size'] = 12024;

		$this->load->library('upload',$config);

		if(! $this->upload->do_upload('file')){
			 echo $this->upload->display_errors();
		}else{
			$namaBarang = $this->input->post('nama_barang');
			$idKategori = $this->input->post('id_kategori');
			$jumlahStock = $this->input->post('stock');
			$file = $this->upload->data();
			$gambar = $file['file_name'];
			$jenis_barang = $this->input->post('jenis_barang');
			$harga =  $this->input->post('harga');
			$data = array(

				'nama_barang' => $namaBarang,
				'Id_Kategori' => $idKategori,
				'jenis_barang' => $jenis_barang,			
				'stock' => $jumlahStock,
				'harga' => $harga,
				'gambar' => $gambar
			);

			if($this->M_Barang->insert($data)){
				return redirect("C_Admin/");
			}
		}
	}


	public function tambah(){
		$this->load->model('M_Barang');
		$data['row'] = $this->M_Barang->get();
		$data['kategori'] = $this->M_Barang->getKategori();
		$this->load->view("Admin/header"); 
		$this->load->view("Admin/tambah_barang",$data); 
		$this->load->view("Admin/footer"); 
	}

	public function update($id){
		$where = array('id_barang'=> $id);
		$data ['tb_barang'] = $this->M_Barang->updateBarang($where,'tb_barang')->result();
		$this->load->view('Admin/header.php');
		$this->load->view('Admin/editKelolabarang',$data);
	}

	public function prosesUpdate($id){
		$nama_barang = $this->input->post('nama_barang');
		$id_kategori =  $this->input->post('id_kategori');
		$jenis_barang = $this->input->post('jenis_barang');
		$stock = $this->input->post('stock');
		$harga = $this->input->post('harga');

		if (!empty($_FILES['file']['name'])) {

		}else{


			$data = array(
				'nama_barang' => $nama_barang,
				'jenis_barang' => $jenis_barang,
				'stock' => $stock,
				'harga' => $harga
			);

			if($this->M_Barang->updateData($id,$data)){
				redirect("C_Barang/");
			}else{
				echo "error";
			}			
		}

	}

	public function generateName(){
		$String = random_string('alpha', 10);
		$Num = rand(100,999);

		return $String . "_" . $Num . ".png";
	}

	public function hapus($id){
		$this->M_Barang->hapusData($id);
			redirect(site_url("C_Barang"));
	}



}



