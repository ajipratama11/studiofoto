<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pintasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        // if($this->session->userdata('status') != "admin"){
        // 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Owner_controller/A_login')."';
        //     </script>";//Url tujuan
        // }
    }

    public function index(){
        redirect('Customer/Beranda');
    }
    public function admin(){
        redirect('Admin/Beranda');
    }
}