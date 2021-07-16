<?php

class M_Kasir extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function getPerdana()
    {
        $this->db->select("*");
        $this->db->from("tb_barang");
        $this->db->where('ID_Kategori', 3);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function getDataPulsa()
    {
        $this->db->select("*");
        $this->db->from("tb_transaksi_pulsa");
        $this->db->where('status', 0);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function getDataKuota()
    {
        $query = $this->db->query("SELECT *,tb_detail_kuota.jumlah_kuota,tb_detail_kuota.masa_aktif,tb_detail_kuota.harga_kuota FROM tb_transaksi_kuota INNER JOIN tb_detail_kuota ON tb_transaksi_kuota.id_detail_kuota = tb_detail_kuota.id_detailkuota WHERE status = '0' ");
        $data = $query->result_array();
        return $data;
    }

    public function getKartuKuota()
    {
        $this->db->select("*");
        $this->db->from("tb_barang");
        $this->db->where('ID_Kategori', 2);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function getAksesoris()
    {
        $this->db->select("*");
        $this->db->from("tb_barang");
        $this->db->where('ID_Kategori', 4);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function updatePulsa($id_transPulsa){
            $this->db->where('id_transpulsa',$id_transPulsa);
            $data = array(
                'status' => 1,
            );
            return $this->db->update('tb_transaksi_pulsa',$data);
    }

    public function updateKuota($id_transaksi_kuota){
            $this->db->where('id_transaksi_kuota',$id_transaksi_kuota);
            $data = array(
                'status' => 1,
            );
            return $this->db->update('tb_transaksi_kuota',$data);
    }

    public function getDataById($id_transaksi){
        $this->db->select("*");
        $this->db->from("tb_transaksi");
        $this->db->where('id_transaksi',$id_transaksi);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function getDataPulsaById($id_transPulsa){
        $this->db->select("*");
        $this->db->from("tb_transaksi_pulsa");
        $this->db->where('id_transpulsa',$id_transPulsa);
        $data = $this->db->get();
        return $data->result_array();
    }  

    public function getDataKuotaById($id_transaksi_kuota){
        $query = $this->db->query("SELECT *,tb_detail_kuota.jumlah_kuota,tb_detail_kuota.masa_aktif,tb_detail_kuota.harga_kuota FROM tb_transaksi_kuota INNER JOIN tb_detail_kuota ON tb_transaksi_kuota.id_detail_kuota = tb_detail_kuota.id_detailkuota WHERE id_transaksi_kuota = '$id_transaksi_kuota' ");
        $data = $query->result_array();
        return $data;
    }  


    public function getDataChat(){
        $query = $this->db->query("SELECT * ,tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan FROM tb_chat INNER JOIN tb_pelanggan ON tb_pelanggan.id_pelanggan = send_from WHERE id IN (SELECT max(id) FROM tb_chat GROUP BY send_from) AND send_to='1'");
        return  $query->result_array();

    }

    public function getDataChatUser($id){
        $query = $this->db->query("SELECT * FROM tb_chat  WHERE send_from = '$id' OR send_to = '$id'  ");
        return $query->result_array();
    }

    public function insertChat($data){
            return $this->db->insert('tb_chat',$data);
    }
}