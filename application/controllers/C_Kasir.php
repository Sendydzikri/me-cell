<?php


class C_Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_Kasir');
        $this->load->model('M_transaksi');

        //date_default_timezone_set("Asia/Bangkok");
        $is_logged = $this->session->userdata('id_kasir');
        if (!$is_logged) {
            $this->session->set_flashdata('gagal','Mohon Login Terlebih Dahulu !');
            redirect('C_Login/loginKasir', 'refresh');
        }        
    }

    public function index()
    {
        $this->load->view('Kasir/header');
        $this->load->view('Kasir/V_MenuKasir');
        $this->load->view('Kasir/footer');
    }

    public function transaksi(){
        $data['row'] = $this->M_transaksi->get();
        $this->load->view('Kasir/header');
        $this->load->view("Kasir/V_KelolaTransaksi",$data);
        $this->load->view("Kasir/footer");
    }

    public function tampilPulsa(){
        $data['row'] = $this->M_Kasir->getDataPulsa();
        $this->load->view('Kasir/header');
        $this->load->view("Kasir/V_KelolaPulsa",$data);
        $this->load->view("Kasir/footer");
    }

    public function tampilKuota(){
        $data['row'] = $this->M_Kasir->getDataKuota();
        $this->load->view('Kasir/header');
        $this->load->view("Kasir/V_KelolaKuota",$data);
        $this->load->view("Kasir/footer");
    }


    public function tampilPerdana()
    {
        $data['barang'] = $this->M_Kasir->getPerdana();
        $this->load->view('Kasir/header');
        $this->load->view('Kasir/V_MenuKasir');
        $this->load->view('Kasir/V_tabelperdana', $data);
        $this->load->view('Kasir/footer');
    }

    public function tampilKartuKuota()
    {
        $data['barang'] = $this->M_Kasir->getKartuKuota();
        $this->load->view('Kasir/header');
        $this->load->view('Kasir/V_MenuKasir');
        $this->load->view('Kasir/V_tampilkartukuota', $data);
        $this->load->view('Kasir/footer');
    }

    public function tampilAksesoris()
    {
        $data['barang'] = $this->M_Kasir->getAksesoris();
        $this->load->view('Kasir/header');
        $this->load->view('Kasir/V_MenuKasir');
        $this->load->view('Kasir/V_tampilaksesoris', $data);
        $this->load->view('Kasir/footer');
    }

    public function cetak($id_transaksi){
        $data['transaksi'] = $this->M_Kasir->getDataById($id_transaksi);
        if($this->M_transaksi->updateTransaksi($id_transaksi)){

            $this->load->view('Kasir/cetakStruk',$data);
       
        }

    }

    public function cetakPulsa($id_transpulsa){
        $data['transpulsa'] = $this->M_Kasir->getDataPulsaById($id_transpulsa);
        if($this->M_Kasir->updatePulsa($id_transpulsa)){
            $this->load->view('Kasir/cetakPulsa',$data);
        }

    }


    public function cetakKuota($id_transaksi_kuota){
        $data['transaksi'] = $this->M_Kasir->getDataKuotaById($id_transaksi_kuota);
        if($this->M_Kasir->updateKuota($id_transaksi_kuota)){
            $this->load->view('Kasir/cetakKuota',$data);
        }

    }


    public function tampilChat(){
        $data['chat'] = $this->M_Kasir->getDataChat();
        $this->load->view('Kasir/header',$data);
        $this->load->view('Kasir/V_Chat');
        $this->load->view('Kasir/footer');
    }

    public function ambilDataChat(){
        $id = $this->input->post('id');

        $dataChat = $this->M_Kasir->getDataChatUser($id);

        $textKirim = "<p class='text-secondary'>";
        $textClose = "</p>";
        $divBR = '<br>';
        $divBB = '<b>';
        $divTB = '</b>';
        $divBuka = '<div class="container">';
        $divTutup = '</div>';
        $hasil = "";
        $path = base_url();

        foreach($dataChat as $dc){
            if($dc['send_from'] != $id){
                if($dc['lampiran'] == null){
                    $hasil = $hasil . $divBuka . $divBB . $divBR . "Anda" . $divTB . $divBR . $dc['isi'] . $divBR . $divBR . $textKirim . "terkirim : " . $dc['tgl_chat'] . $textClose . "<hr>" . $divTutup;                    
                }else{

                   $urlGambar = base_url() . 'upload/chat/folder-'.'1'. "/". $dc['lampiran'] ;

                    $hasil = $hasil . $divBuka . $divBB . $divBR . "Anda" . $divTB . $divBR . $dc['isi'] . $divBR . '<img src="'. $urlGambar . '"' . 'alt="Gambar"'   . 'width="200"' . 'height="300">' .$divBR . $textKirim . "terkirim : " . $dc['tgl_chat'] . $textClose . "<hr>" . $divTutup;  
                }
            }else{
                if($dc['lampiran'] == null){
                    $hasil = $hasil . $divBuka . $divBB . $divBR . "user" . $divTB . $divBR . $dc['isi'] . $divBR . $divBR . $textKirim . "terkirim : " . $dc['tgl_chat'] . $textClose . "<hr>" . $divTutup;                    
                }else{

                   $urlGambar = base_url() . 'upload/chat/folder-'.$id. "/". $dc['lampiran'] ;

                    $hasil = $hasil . $divBuka . $divBB . $divBR . "user" . $divTB . $divBR . $dc['isi'] . $divBR . '<img src="'. $urlGambar . '"' . 'alt="Gambar"'   . 'width="200"' . 'height="300">' .$divBR . $textKirim . "terkirim : " . $dc['tgl_chat'] . $textClose . "<hr>" . $divTutup;  
                }

            }
        }

        echo json_encode($hasil);

    }

        public function insertChat(){
        $id = 1;
        $id_pelanggan = $this->input->post('id_pelanggan');
        $path = './upload/chat/folder-'.$id;
        
        if (!empty($_FILES['file']['name'])) {
        
            if (!is_dir($path)) {
                mkdir($path);
            }
            $config['upload_path'] = './upload/chat/folder-'. '1' ;
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
                    'send_from' => $id,
                    'send_to' => $id_pelanggan,
                    'lampiran' => $files,
                    'tgl_chat' =>date('Y-m-d'), 

                );

                if($this->M_Kasir->insertChat($data)){
                    return redirect("C_Kasir/tampilChat/");
                }
            }
        }else{

            $isi = $this->input->post('isi');
            $data = array(
                'isi' => $isi,
                'send_from' => $id,
                'send_to' => $id_pelanggan,
                'tgl_chat' =>date('Y-m-d'), 
                );
            if($this->M_Kasir->insertChat($data)){
                return redirect("C_Kasir/tampilChat/");
            }

        }



        
    }
}