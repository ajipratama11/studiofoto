<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        $this->load->model('M_pemesan');
        if ($this->session->userdata('status') != "admin") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Admin/Login') . "';
            </script>"; //Url Logi
        }
    }

    public function index()
    {
        $this->db->select('SUM(total_bayar) as total');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan=konfirmasi_pembayaran.id_pemesanan');
        $this->db->where('status_cus', 'Pesanan Selesai');
        $data['total'] = $this->db->get('konfirmasi_pembayaran')->row();

        $this->db->select('SUM(biaya_pengeluaran) as total');
        $data['keluar'] = $this->db->get('tbl_pengeluaran')->row();

        $this->load->helper('tgl_indo');
        $waktu = date('Y-m-d');
        $data['waktu'] = formatHariTanggal($waktu);
        $this->load->view('Admin/v_beranda', $data);
    }

    public function pemesanan()
    {
        $data['pemesanan'] = $this->M_pemesan->tampil_pesan();
        $this->load->view('Admin/v_pemesanan', $data);
    }
    public function statusDP()
    {
        $idpesan = $this->uri->segment(4);
        $status = 'DP Terbayar';
        $this->M_pemesan->updatestatus($idpesan, $status);
        redirect('Admin/Beranda/pemesanan');
    }

    public function statusSelesai()
    {
        $idpesan = $this->uri->segment(4);
        $status = 'Pesanan Selesai';
        $this->M_pemesan->updatestatus($idpesan, $status);
        redirect('Admin/Beranda/pemesanan');
    }
}
