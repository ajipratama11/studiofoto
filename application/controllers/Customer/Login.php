<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->load->view('Customer/v_login');
    }

    public function daftar()
    {
        $this->load->view('Customer/v_daftar');
    }

    public function login_cus()
    {
        $post = $this->input->post();
        $u = $this->username = $post['username'];
        $p = $this->password = $post['password'];
        $this->db->where('username', $u);
        $this->db->where('password', $p);
        $data = $this->db->get('customer')->row_array();

        if ($data > 0) {
            $data_session = array(
                'id_cus' => $data['id_cus'],
                'nama_cus' => $data['nama_cus'],
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect('Customer/Beranda/');
        } else {
            $this->session->set_flashdata(
                'gagal',
                '<div class="alert alert-danger col-md-12" >
                    <p> Aduh, username atau password salah!!!</p>
                </div>'
            );
            redirect('Customer/Login/index');
        }
    }
    public function daftar_cus()
    {
        $post = $this->input->post();
        $this->nama_cus = $post['nama_cus'];
        $this->alamat_cus = $post['alamat_cus'];
        $this->no_hp = $post['no_hp'];
        $this->email_cus = $post['email_cus'];
        $this->username = $post['username'];
        $this->password = $post['password'];
        $data = $this->db->insert('customer', $this);
        if ($data) {
            $this->session->set_flashdata(
                'daftar',
                '<div class="alert alert-success col-md-12" >
                    <p> Yeay, pendaftaran berhasil!!!</p>
                </div>'
            );
        }
        redirect('Customer/Login/index');
    }
}
