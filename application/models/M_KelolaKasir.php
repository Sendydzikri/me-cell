<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_KelolaKasir extends CI_Model
{
    private $_table = "tb_kasir";

    public $id_kasir;
    public $nama_kasir;
    public $alamat_kasir;
    public $nohp_kasir;
    public $cabang;
    public $email;
    public $username_kasir;
    public $password_kasir;

    public function rules()
    {
        return [
            [
                'field' => 'nama_kasir',
                'label' => 'Nama',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kasir" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kasir = uniqid();
        $this->nama_kasir = $post["nama_kasir"];
        $this->alamat_kasir = $post["alamat_kasir"];
        $this->nohp_kasir = $post["nohp_kasir"];
        $this->cabang = $post["cabang"];
        $this->email = $post["email"];
        $this->username_kasir = $post["username_kasir"];
        $this->password_kasir = $post["password_kasir"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kasir = $post["id"];
        $this->nama_kasir = $post["nama_kasir"];
        $this->alamat_kasir = $post["alamat_kasir"];
        $this->nohp_kasir = $post["nohp_kasir"];
        $this->cabang = $post["cabang"];
        $this->email = $post["email"];
        $this->username_kasir = $post["username_kasir"];
        $this->password_kasir = $post["password_kasir"];

        return $this->db->update($this->_table, $this, array('id_kasir' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kasir" => $id));
    }
}