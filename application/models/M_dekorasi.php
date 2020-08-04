<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dekorasi extends CI_Model
{

    private $_table = 'dekorasi';
    private $_table2 = 'sesi_pemotretan';



    public $id_dekorasi;
    public $nama_dekorasi;
    public $harga_dekorasi;





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

    function updateDekorasi($id_dekorasi)
    {
        $post = $this->input->post();
        $this->id_dekorasi = $post['id_dekorasi'];
        $this->nama_dekorasi = $post['nama_dekorasi'];
        $this->harga_dekorasi = $post['harga_dekorasi'];
        $this->deskripsi_dekorasi = $post['deskripsi_dekorasi'];
        $this->db->update($this->_table, $this, array("id_dekorasi" => $id_dekorasi));
    }

    function deleteDekorasi($id_dekorasi)
    {
        return $this->db->delete($this->_table, array("id_dekorasi" => $id_dekorasi));
    }
    function updateSesi($id_sesi)
    {
        $post = $this->input->post();
        $this->id_sesi = $post['id_sesi'];
        $this->jumlah_sesi = $post['jumlah_sesi'];
        $this->harga_sesi = $post['harga_sesi'];
        $this->db->update($this->_table2, $this, array("id_sesi" => $id_sesi));
    }

    function deleteSesi($id_sesi)
    {
        return $this->db->delete($this->_table2, array("id_sesi" => $id_sesi));
    }
}
