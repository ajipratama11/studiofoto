<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
        $this->load->helper(array('url'));
        if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin/Login')."';
            </script>";//Url Logi
		}
    }

    public function index()
    {
        $data['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('Admin/v_kategori', $data);
    }

    public function tambahKategori(){
        $post = $this->input->post();
        $this->nama_kategori = $post['nama_kategori'];
        $this->harga = $post['harga'];
        $this->deskripsi = $post['deskripsi'];
        $data = $this->db->insert('kategori', $this);
        if($data){
            echo "<script>
                alert('Berhasil Tambah Kategori');
                window.location.href = '".base_url('Admin/Kategori')."';
            </script>";//Url Logi
        }
       

    }

    public function editKategori($id_kategori = null){
        $this->M_kategori->UpdateKategori($id_kategori);
        redirect('Admin/Kategori');  

    }
    public function hapusKategori($id_kategori = null){
        $this->M_kategori->deleteKategori($id_kategori);
        redirect('Admin/Kategori');  
    }
}
