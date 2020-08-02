<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        // if($this->session->userdata('status') != "admin"){
        // 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Owner_controller/A_login')."';
        //     </script>";//Url tujuan
        // }
    }

    public function index()
    {
    }

    public function detail_kategori($id_kategori = null)
    {
        $this->db->join('galeri', 'galeri.id_kategori=kategori.id_kategori');
        $this->db->where('kategori.id_kategori', $id_kategori);
        $data['kategori'] = $this->db->get('kategori')->row_array();

        $this->db->join('kategori', 'galeri.id_kategori=kategori.id_kategori');
        $this->db->where('galeri.id_kategori', $id_kategori);
        $data['galeri'] = $this->db->get('galeri')->result();
        $this->load->view('Customer/v_detail_kategori', $data);
    }
}
