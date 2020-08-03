<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_galeri extends CI_Model
{

    private $_table = 'galeri';



    public $foto;
    public $id_kategori;




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
    public function getgaleri()
    {
        return $this->db->get('kategori')->result();
    }
    function galeri($idk){
		$query = $this->db->query("SELECT * FROM galeri JOIN kategori ON kategori.id_kategori=galeri.id_kategori WHERE kategori.id_kategori='$idk'");
		return $query->result();
	}
	function galeri2(){
		$query = $this->db->query("SELECT * FROM galeri JOIN kategori ON kategori.id_kategori=galeri.id_kategori");
		return $query->result();
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
    public function getById($id_galeri)
	{
		return $this->db->get_where($this->_table, ["id_galeri" => $id_galeri])->row();
	}

	function deleteFoto($id_galeri)
	{
		$this->_deleteImage($id_galeri);
		return $this->db->delete($this->_table, array("id_galeri" => $id_galeri));
	}
	private function _deleteImage($id_galeri)
	{
		$product = $this->getById($id_galeri);
		if ($product->foto != "camera.jpg") {
			$filename = explode(".", $product->foto)[0];
			return array_map('unlink', glob(FCPATH . "assets/images/$filename.*"));
		}
	}
}
