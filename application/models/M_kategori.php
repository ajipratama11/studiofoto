<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{

    private $_table = 'kategori';



    public $id_kategori;
    public $nama_kategori;
    public $harga;
    public $deskripsi;




    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama_ayah',
                'label' => 'Name',
                'rules' => 'required'
            ]
        ];
    }



    public function getakun()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('tb_gtk', 'tb_gtk.id_gtk =users.id_gtk');
        $this->db->join('jabatan', 'jabatan.id_jabatan=users.jabatan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getjabatan()
    {
        return $this->db->get('jabatan')->result();
    }
    public function getgtk()
    {
        return $this->db->get('tb_gtk')->result();
    }

    public function getAkunSelect($id_gtk)
    {
        $this->db->select('*');
        $this->db->from("users");
        $this->db->where("id_gtk !=", $id_gtk);
        $query = $this->db->get();
        return $query->result();
    }

    function updateKategori($id_kategori)
    {
        $post = $this->input->post();
        $this->id_kategori = $post['id_kategori'];
        $this->nama_kategori = $post['nama_kategori'];
        $this->harga = $post['harga'];
        $this->deskripsi = $post['deskripsi'];
        $this->db->update($this->_table, $this, array("id_kategori" => $id_kategori));
    }

    function deleteKategori($id_kategori)
    {
        return $this->db->delete($this->_table, array("id_kategori" => $id_kategori));
    }
}
