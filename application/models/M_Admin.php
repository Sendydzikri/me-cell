<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function get()
    {
        // $this->db->from('tb_kasir');
        // if ($id != null) {
        //     $this->db->where('id_kasir', $id);
        // }
        // $query = $this->db->get();
        // return $query;

        return $this->db->get("tb_kasir");
    }

    public function getKasir()
    {
        $this->db->select("*");
        $this->db->from("tb_kasir");
        $data = $this->db->get();
        return $data->result_array();


    }

    public function getSearchKasir($data){
        $query = $this->db->query("SELECT * FROM tb_kasir WHERE nama_kasir LIKE '%".$data."%'");
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('tb_kasir', $data);

    }

    public function tambahAdmin(){
        $data = array(

            'nama_admin' => "james",
            'email' => "james@gmail.com",
            'nama_admin' => "stevan james",
            'username_admin' => "admin",
            'password_admin' => password_hash("password", PASSWORD_DEFAULT)

        );

        return $this->db->insert('tb_admin', $data);

    }

    public function getKasirById($id_kasir){
        $this->db->select("*");
        $this->db->from('tb_kasir');
        $this->db->where('id_kasir',$id_kasir);
        $data = $this->db->get();
        return $data->result_array();

    }

    public function updateKasir($id_kasir,$data){
        $this->db->where('id_kasir',$id_kasir);
        return $this->db->update('tb_kasir',$data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_kasir', $id);
        return $this->db->delete('tb_kasir');
    }


    public function ambilLaporanBarang(){
        $query = $this->db->query("SELECT * , nama_pelanggan , nama_barang , (SELECT sum(total_harga) FROM tb_transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) 
            AND status != '0' AND status != '1' ) as total_pendapatan ,
            (SELECT sum(jumlah_barang) FROM tb_transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) 
            AND status != '0' AND status != '1') as barang_terjual
            FROM tb_transaksi
            INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan 
            INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang  
            WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) 
            AND status != '0' 
            AND status != '1'
            GROUP BY id,id_transaksi
            ORDER BY total_harga DESC ");

        $data = $query->result_array();
        return $data;
    }

   public function ambilDataBarangByTGL($tgl_awal,$tgl_akhir){


        $query = $this->db->query("SELECT * , nama_pelanggan , nama_barang , 
        (SELECT sum(total_harga) FROM tb_transaksi WHERE tanggal_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir' AND status !='0'AND status != '1' ) as total_pendapatan , 
        (SELECT sum(jumlah_barang) FROM tb_transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) 
            AND status != '0' AND status != '1') as barang_terjual
        FROM tb_transaksi
        INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan 
        INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang  
        WHERE tanggal_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir' 
        AND status !='0'  AND status != '1'
        GROUP BY id,id_transaksi
        ORDER BY total_harga DESC");

        $data = $query->result_array();
        return $data;
   }

   public function ambilDataBarangByBulan(){
        $query = $this->db->query("SELECT * , nama_pelanggan , nama_barang , 
        (SELECT sum(total_harga) FROM tb_transaksi WHERE status !='0'AND status != '1' ) as total_pendapatan , 
        (SELECT sum(jumlah_barang) FROM tb_transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) 
            AND status != '0' AND status != '1') as barang_terjual
        FROM tb_transaksi
        INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan 
        INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang  
        WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE())
        AND status !='0'  AND status != '1'
        GROUP BY id,id_transaksi
        ORDER BY total_harga DESC");

        $data = $query->result_array();
        return $data;
   }   
}