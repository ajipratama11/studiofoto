<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekorasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dekorasi');
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
        $data['dekorasi'] = $this->db->get('dekorasi')->result();
        $this->load->view('Admin/v_dekorasi', $data);
    }

    public function tambahDekorasi()
    {
        $post = $this->input->post();
        $this->nama_dekorasi = $post['nama_dekorasi'];
        $this->harga_dekorasi = $post['harga_dekorasi'];
        $this->deskripsi_dekorasi = $post['deskripsi_dekorasi'];
        $data = $this->db->insert('dekorasi', $this);
        if ($data) {
            echo "<script>
                alert('Berhasil Tambah Dekorasi');
                window.location.href = '" . base_url('Admin/Dekorasi') . "';
            </script>"; //Url Logi
        }
    }

    public function editDekorasi($id_dekorasi = null)
    {
        $this->M_dekorasi->UpdateDekorasi($id_dekorasi);
        redirect('Admin/Dekorasi');
    }
    public function hapusDekorasi($id_dekorasi = null)
    {
        $this->M_dekorasi->deleteDekorasi($id_dekorasi);
        redirect('Admin/Dekorasi');
    }

    public function sesi()
    {
        $data['sesi'] = $this->db->get('sesi_pemotretan')->result();
        $this->load->view('Admin/v_sesi', $data);
    }

    public function tambahSesi()
    {
        $post = $this->input->post();
        $this->jumlah_sesi = $post['jumlah_sesi'];
        $this->harga_sesi = $post['harga_sesi'];
        $data = $this->db->insert('sesi_pemotretan', $this);
        if ($data) {
            echo "<script>
                alert('Berhasil Tambah Sesi Pemotretan');
                window.location.href = '" . base_url('Admin/Dekorasi/sesi') . "';
            </script>"; //Url Logi
        }
    }

    public function editSesi($id_sesi = null)
    {
        $post = $this->input->post();
        $this->id_sesi = $post['id_sesi'];
        $this->jumlah_sesi = $post['jumlah_sesi'];
        $this->harga_sesi = $post['harga_sesi'];
        $this->db->update('sesi_pemotretan', $this, array("id_sesi" => $id_sesi));
        redirect('Admin/Dekorasi/sesi');
    }
    public function hapusSesi($id_sesi = null)
    {
        $this->db->delete('sesi_pemotretan', array("id_sesi" => $id_sesi));
        redirect('Admin/Dekorasi/sesi');
    }
}
