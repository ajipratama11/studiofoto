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

    public function detail_kategori($id_kategori = null)
    {
        $this->db->where('id_kategori', $id_kategori);
        $data['kategori'] = $this->db->get('kategori')->row_array();
        $this->load->view('Customer/v_detail_kategori', $data);
    }
}
