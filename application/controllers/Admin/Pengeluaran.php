<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

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
    }

    public function tambah()
    {
        $post = $this->input->post();
        $this->nama_pengeluaran = $post['nama_pengeluaran'];
        $this->biaya_pengeluaran = $post['biaya_pengeluaran'];
        $this->deskripsi_pengeluaran = $post['deskripsi_pengeluaran'];
        $this->tgl_pengeluaran = formatHariTanggal($post['tgl_pengeluaran']);
        $this->id_jenis_pengeluaran = $post['id_jenis_pengeluaran'];
        $data = $this->db->insert('tbl_pengeluaran', $this);

        if ($data) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Pengeluaran ditambahkan!</div>');
            redirect('Admin/Beranda');
        }
    }
}
