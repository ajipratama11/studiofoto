<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_models/MA_Laporan');

        $this->load->helper(array('url'));
        if ($this->session->userdata('status') != "admin") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Admin/Login') . "';
            </script>"; //Url Logi
        }
    }

    public function index()
    {
        $this->db->join('kategori', 'pemesanan.id_kategori=kategori.id_kategori');
        $this->db->join('customer', 'pemesanan.id_cus=customer.id_cus');
        $this->db->join('dekorasi', 'pemesanan.id_dekorasi=dekorasi.id_dekorasi');
        $this->db->join('sesi_pemotretan', 'pemesanan.id_sesi=sesi_pemotretan.id_sesi');
        $data['a'] = $this->db->get('pemesanan')->result();
        $this->load->view('Admin/v_lap_pemasukan', $data);
    }
    public function pengeluaran()
    {
        $data['a'] = $this->db->get('tbl_pengeluaran')->result();
        $this->load->view('Admin/v_lap_pengeluaran', $data);
    }
    public function pemasukanList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getPemasukkan($postData);

        echo json_encode($data);
    }
    public function pengeluaranList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getPengeluaran($postData);

        echo json_encode($data);
    }
    public function laporan_pemasukan()
    {
        $post = $this->input->post();
        $data['bulan'] = $post['bulan'];

        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.id_pemesanan=pemesanan.id_pemesanan');
        $this->db->like('tgl_checkout', $post['bulan'], 'both');
        $data['list'] = $this->db->get('pemesanan')->result();

        $this->db->select('SUM(total_bayar) as total');
        $this->db->like('tgl_checkout', $post['bulan'], 'both');
        $data['total'] = $this->db->get('konfirmasi_pembayaran')->row();

        $this->load->view('Admin/v_cetak_pemasukan', $data);
    }
    public function laporan_pengeluaran()
    {
        $post = $this->input->post();
        $data['bulan'] = $post['bulan'];

        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran=tbl_pengeluaran.id_jenis_pengeluaran');
        $this->db->like('tgl_pengeluaran', $post['bulan'], 'both');
        $data['list'] = $this->db->get('tbl_pengeluaran')->result();

        $this->db->select('SUM(biaya_pengeluaran) as total');
        $this->db->like('tgl_pengeluaran', $post['bulan'], 'both');
        $data['total'] = $this->db->get('tbl_pengeluaran')->row();

        $this->load->view('Admin/v_cetak_pengeluaran', $data);
    }
}
