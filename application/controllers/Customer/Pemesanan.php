<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
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

        if ($post['jenis'] == "Studio") {
            $lama = $sesi->jumlah_sesi * 3;
        } else if ($post['jenis'] == "Tempat Lain") {
            $lama = $sesi->jumlah_sesi * 6;
        }


        $this->db->where('id_dekorasi', $post['id_dekorasi']);
        $dekor = $this->db->get('dekorasi')->row();

        $this->db->where('id_kategori', $post['id_kategori']);
        $kategori = $this->db->get('kategori')->row();

        //add 1 hour to time
        $cenvertedTime = date('H:i', strtotime('+' . $lama . ' minutes', strtotime($post['waktu'])));
        $date = date("d-m-Y", strtotime($post['tanggal']));
        $this->lokasi = $post['lokasi'];
        $tgl = $this->tgl_pemesanan = $date;
        $mulai = $this->waktu_pemesanan = $post['waktu'];
        $selesai = $this->waktu_selesai = $cenvertedTime;
        $this->total_biaya = $dekor->harga_dekorasi + $sesi->harga_sesi + $kategori->harga;
        $this->status_cus = "Belum Checkout";


        var_dump($mulai);
        var_dump($selesai);
        var_dump($tgl);

        $cek_jadwal = $this->db->query("SELECT * FROM `pemesanan` WHERE '$mulai' >=  waktu_pemesanan   and '$mulai' <=  waktu_selesai AND  tgl_pemesanan =  '$tgl' AND status_cus='Sudah Checkout'  ")->row();
        $cek_jadwal2 = $this->db->query("SELECT * FROM `pemesanan` WHERE '$selesai' >=  waktu_pemesanan   and '$selesai' <=  waktu_selesai AND  tgl_pemesanan =  '$tgl' AND status_cus='Sudah Checkout'  ")->row();
        if (!$this->session->userdata('id_cus')) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login dulu yaaa !</div><br>');
            redirect('Customer/Login');
        } else {
            if ($cek_jadwal) {
                $this->session->set_flashdata(
                    'gagal',
                    '<div class="alert alert-danger col-md-12" >
                    <p> Jadwal sudah ada yang memesan!!!</p>
                  
                </div>'
                );
                redirect('Customer/Pemesanan/pemesanan/' . $this->id_kategori);
            } else if ($cek_jadwal2) {
                $this->session->set_flashdata(
                    'gagal',
                    '<div class="alert alert-danger col-md-12" >
                    <p> Jadwal sudah ada yang memesan!!!</p>
                  
                </div>'
                );
                redirect('Customer/Pemesanan/pemesanan/' . $this->id_kategori);
            } else {
                $data = $this->db->insert('pemesanan', $this);
                redirect('Customer/Keranjang/');
            }
        }


        // $this->db->like('tgl_pemesanan', $this->tgl_pemesanan);
        // $this->db->like('waktu_pemesanan', $this->waktu_pemesanan);
        // $jadwal = $this->db->get('pemesanan')->row();
        // if ($jadwal) {
        //     $this->session->set_flashdata(
        //         'gagal',
        //         '<div class="alert alert-danger col-md-12" >
        //             <p> Jadwal sudah ada yang memesan!!!</p>

        //         </div>'
        //     );
        //     redirect('Customer/Pemesanan/pemesanan/' . $this->id_kategori);
        // } else {
        //     $data = $this->db->insert('pemesanan', $this);
        // }
    }

    public function jadwalList()
    {
        $postData = $this->input->post();
        $data = $this->M_pemesan->getJadwal($postData);

        echo json_encode($data);
    }
}
