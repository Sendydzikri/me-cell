<?php
class C_Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('M_Admin');
        date_default_timezone_set("Asia/Bangkok");
        $is_logged = $this->session->userdata('id_admin');
        if (!$is_logged) {
            redirect('C_Login/loginAdmin', 'refresh');
        }  
    }

    public function kelolaLaporan(){
        $data['laporan'] = $this->M_Admin->ambilLaporanBarang();
        $data['url'] = "kelolaLaporan";
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_KelolaLaporanBarang",$data);
        $this->load->view("Admin/footer");
    }


    public function kelolaLaporanTanggal(){
        $data['url'] = "kelolaLaporanTanggal";
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;


        $data['laporan'] = $this->M_Admin->ambilDataBarangByTGL($tanggal_awal,$tanggal_akhir);
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_KelolaLaporanBarang",$data);
        $this->load->view("Admin/footer");
    }
    public function printLaporanBulanan(){
        
        $data['laporan'] = $this->M_Admin->ambilDataBarangByBulan();
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_printLaporanBulan",$data);
        $this->load->view("Admin/footer");

    }


    public function printLaporanTanggal(){

        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;

        $data['laporan'] = $this->M_Admin->ambilDataBarangByTGL($tanggal_awal,$tanggal_akhir);
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_printLaporanTanggal",$data);
        $this->load->view("Admin/footer");
    }

    public function getIDKasir($length = 4){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index()
    {
        $this->load->view("Admin/header");
        $this->load->view("Admin/menu_admin");
        $this->load->view("Admin/footer");
    }

    public function tampilKelolaKasir()
    {
        $data['kasir'] = $this->M_Admin->getKasir();
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_KelolaDataKasir", $data);
        $this->load->view("Admin/footer");
    }

    public function tampilSearchKasir(){
        $search = $this->input->post('data'); 
        $data['kasir'] = $this->M_Admin->getSearchKasir($search);
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_KelolaDatakasir", $data);
        $this->load->view("Admin/footer");
    }


    public function tambahKasir()
    {
        $this->load->model('M_Admin');
        $data['tb_kasir'] = $this->M_Admin->get();

        $this->load->view("Admin/header");
        $this->load->view("Admin/V_FormTambahKasir", $data);
        $this->load->view("Admin/footer");
    }

    public function aksitambahKasir()
    {
        $NamaKasir = $this->input->post('Nama_Kasir');
        $AlamatKasir = $this->input->post('Alamat_Kasir');
        $NOHPKasir = $this->input->post('NOHP_Kasir');
        $Cabang = $this->input->post('Cabang');
        $Email = $this->input->post('Email');
        $UsernameKasir = $this->input->post('Username_Kasir');
        $passwordKasir = password_hash($this->input->post('Password_Kasir'), PASSWORD_DEFAULT);
        $data = array(
            'id_kasir' => 'K-' . $this->getIDKasir(),
            'nama_kasir' => $NamaKasir,
            'alamat_kasir' => $AlamatKasir,
            'nohp_kasir' => $NOHPKasir,
            'cabang' => $Cabang,
            'email' => $Email,
            'username_kasir' => $UsernameKasir,
            'password_kasir' => $passwordKasir
        );

        $data1 = $this->M_Admin->insert($data);
        redirect('C_Admin/tampilKelolaKasir');
    }

    public function editKasir($id_kasir)
    {
        $data['kasir'] = $this->M_Admin->getKasirById($id_kasir);
        //$data['kasir'] = $this->M_Admin->getKasir();
        $this->load->view("Admin/header");
        $this->load->view("Admin/V_FormEditKasir", $data);
        $this->load->view("Admin/footer");
    }

    public function hapusKasir($id)
    {
        $this->M_Admin->hapusData($id);
        redirect("C_Admin/tampilKelolaKasir");
    }
    public function aksi_edit_kasir(){

        $id_kasir = $this->input->post('id_kasir');
        if($this->input->post('password_kasir')){
            $data = array(
                'nama_kasir' => $this->input->post('nama_kasir'),
                'alamat_kasir' => $this->input->post('alamat_kasir'),
                'nohp_kasir' => $this->input->post('nohp_kasir'),
                'cabang' => $this->input->post('cabang'),
                'email' => $this->input->post('email'),
                'username_kasir' => $this->input->post('username_kasir'),
                'password_kasir' => password_hash($this->input->post('password_kasir'), PASSWORD_DEFAULT),
            );            
        }else{
            $data = array(
                'nama_kasir' => $this->input->post('nama_kasir'),
                'alamat_kasir' => $this->input->post('alamat_kasir'),
                'nohp_kasir' => $this->input->post('nohp_kasir'),
                'cabang' => $this->input->post('cabang'),
                'email' => $this->input->post('email'),
                'username_kasir' => $this->input->post('username_kasir'),
                
            );
        }

        if($this->M_Admin->updateKasir($id_kasir,$data)){
            return redirect('C_Admin/tampilKelolaKasir');
        }else{
            return redirect('C_Admin/tampilKelolaKasir');
        }
    }

    public function tambahAdmin(){
        $this->M_Admin->tambahAdmin();
    }
}