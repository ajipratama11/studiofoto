<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
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
        $this->db->join('jenis_saldo', 'jenis_saldo.id_jenis=akun.id_jenis');
        $data['akun'] = $this->db->get('akun')->result();
        $this->load->view('Admin/v_akun', $data);
    }

    public function tambahAkun()
    {

        $post = $this->input->post();
        $this->no_reff = $post['no_reff'];
        $this->nama_reff = $post['nama_reff'];
        $this->keterangan_reff = $post['keterangan_reff'];
        $this->id_jenis = $post['id_jenis'];
        $this->id_admin = $this->session->userdata('iduseradmin');
        $data = $this->db->insert('akun', $this);
        if ($data) {
            redirect('Admin/Akun/');
        }
    }
    public function hapusAkun($no_reff = null)
    {
        $this->db->where('no_reff', $no_reff);
        $this->db->delete('akun');
        redirect('Admin/Akun');
    }
}
