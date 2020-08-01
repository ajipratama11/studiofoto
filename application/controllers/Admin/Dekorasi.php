<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekorasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        if($this->session->userdata('status') != "admin"){
        	echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
        }
    }

    public function index()
    {
        $this->load->view('Admin/v_dekorasi');
    }
    public function tambahDekorasi(){

    }

    public function editDekorasi(){

    }
    public function hapusDekorasi(){

    }
}
