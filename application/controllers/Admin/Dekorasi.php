<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekorasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dekorasi');
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
        $data['dekorasi'] = $this->db->get('dekorasi')->result();
        $this->load->view('Admin/v_dekorasi', $data);
    }

    public function tambahDekorasi(){
        $post = $this->input->post();
        $this->nama_dekorasi = $post['nama_dekorasi'];
        $this->harga = $post['harga'];
        $data = $this->db->insert('dekorasi', $this);
        if($data){
            echo "<script>
                alert('Berhasil Tambah Dekorasi');
                window.location.href = '".base_url('Admin/Dekorasi')."';
            </script>";//Url Logi
        }
    }

    public function editDekorasi($id_dekorasi = null){
        $this->M_dekorasi->UpdateDekorasi($id_dekorasi);
        redirect('Admin/Dekorasi');  

    }
    public function hapusDekorasi($id_dekorasi = null){
        $this->M_dekorasi->deleteDekorasi($id_dekorasi);
        redirect('Admin/Dekorasi');  
    }

    public function sesi()
    {
        $data['sesi'] = $this->db->get('sesi_pemotretan')->result();
        $this->load->view('Admin/v_sesi', $data);
    }
    
}
