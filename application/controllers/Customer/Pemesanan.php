<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
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
        $this->load->view('Customer/v_pemesanan');
    }

    public function pemesanan($id_kategori = null)
    {
        $this->db->where('id_kategori', $id_kategori);
        $data['pemesan'] = $this->db->get('kategori')->row_array();

        $data['sesi'] = $this->db->get('sesi_pemotretan')->result();
        $data['dekorasi'] = $this->db->get('dekorasi')->result();
        $this->load->view('Customer/v_pemesanan', $data);
    }
    public function keranjang()
    {
        $post = $this->input->post();
        $this->id_cus = $this->session->userdata('id_cus');
        $this->id_dekorasi = $post['id_dekorasi'];
        $this->id_sesi = $post['id_sesi'];
        $this->id_kategori = $post['id_kategori'];
        $this->jenis = $post['jenis'];

        $this->db->where('id_sesi', $post['id_sesi']);
        $sesi = $this->db->get('sesi_pemotretan')->row();

        if( $post['jenis'] == "Studio"){
            $sesi->jumlah_sesi*3;
        }
       

        $this->db->where('id_dekorasi', $post['id_dekorasi']);
        $dekor = $this->db->get('dekorasi')->row();
       
        $this->db->where('id_kategori', $post['id_kategori']);
        $kategori = $this->db->get('kategori')->row();
        
        $this->lokasi = $post['lokasi'];
        $this->tgl_pemesanan = $post['tanggal'] . ' ' .  $post['waktu'];
        $this->total_biaya = $dekor->harga + $sesi->harga + $kategori->harga;
        $this->status = "Belum Checkout";
        $this->jenis_pembayaran = "Dp";

        $this->db->like('tgl_pemesanan', $this->tgl_pemesanan);
        $jadwal = $this->db->get('pemesanan')->row();
        if ($jadwal) {
            $this->session->set_flashdata(
                'gagal',
                '<div class="alert alert-danger col-md-12" >
                    <p> Jadwal sudah ada yang memesan!!!</p>
                    <button class="button btn-success form-control col-md-2" style="font-size:12px;" id="tombol_show">Lihat Jadwal</button>
                </div>'
            );
            redirect('Customer/Pemesanan/pemesanan/' . $this->id_kategori);
        } else {
            $data = $this->db->insert('pemesanan', $this);
        }
    }
}
