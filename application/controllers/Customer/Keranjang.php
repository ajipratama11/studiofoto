<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        $this->load->model('M_pemesan');
        // if($this->session->userdata('status') != "admin"){
        // 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Owner_controller/A_login')."';
        //     </script>";//Url tujuan
        // }
    }

    public function index()
    {
        $id_cus = $this->session->userdata('id_cus');
        // $this->db->join('kategori', 'kategori.id_kategori=pemesanan.id_kategori');
        // $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        // $this->db->join('sesi_pemotretan', 'sesi_pemotretan.id_sesi=pemesanan.id_sesi');
        // $this->db->join('dekorasi', 'dekorasi.id_dekorasi=pemesanan.id_dekorasi');
        // $this->db->where('pemesanan.id_cus', $id_cus);
        
        $data['cus'] = $this->db->query("SELECT * FROM pemesanan JOIN kategori ON kategori.id_kategori=pemesanan.id_kategori JOIN customer ON customer.id_cus=pemesanan.id_cus JOIN sesi_pemotretan ON sesi_pemotretan.id_sesi=pemesanan.id_sesi JOIN dekorasi ON dekorasi.id_dekorasi=pemesanan.id_dekorasi WHERE pemesanan.id_cus='$id_cus' AND pemesanan.status_cus!='Pesanan Selesai'")->result();
        // $data['cus'] = $this->db->get('pemesanan')->result();
        $this->load->view('Customer/v_keranjang', $data);
    }
    public function histori_pesanan()
    {
        $id_cus = $this->session->userdata('id_cus');
        $this->db->join('kategori', 'kategori.id_kategori=pemesanan.id_kategori');
        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('sesi_pemotretan', 'sesi_pemotretan.id_sesi=pemesanan.id_sesi');
        $this->db->join('dekorasi', 'dekorasi.id_dekorasi=pemesanan.id_dekorasi');
        $this->db->where('pemesanan.id_cus', $id_cus);
        $this->db->where('pemesanan.status_cus', 'Pesanan Selesai');
        $data['cus'] = $this->db->get('pemesanan')->result();
        $this->load->view('Customer/v_historipesanan', $data);
    }

    public function nota(){
		$idpesan = $this->uri->segment(4);
        $data['pemesanan'] = $this->M_pemesan->tampil_pesan2($idpesan);
        $this->load->view('Admin/v_detailtransaksi', $data);
    }
}
