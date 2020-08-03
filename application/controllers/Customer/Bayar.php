<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        // if($this->session->userdata('status') != "admin"){
        // 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Owner_controller/A_login')."';
        //     </script>";//Url tujuan
        // }
    }

    public function index($id_pemesanan = null)
    {
        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('sesi_pemotretan', 'sesi_pemotretan.id_sesi=pemesanan.id_sesi');
        $this->db->join('dekorasi', 'dekorasi.id_dekorasi=pemesanan.id_dekorasi');
        $this->db->join('kategori', 'kategori.id_kategori=pemesanan.id_kategori');
        $this->db->where('id_pemesanan', $id_pemesanan);
        $data['bayar'] = $this->db->get('pemesanan')->row();
        $this->load->view('Customer/v_bayar', $data);
    }
    public function bayar()
    {
        $post = $this->input->post();
        $this->id_pemesanan = $post['id_pemesanan'];
        $this->opsi = $post['opsi'];

        if ($post['opsi'] == 'DP') {
            $this->dp = $post['dp'];
        } else if ($post['opsi'] == 'Lunas') {
            $this->dp = "0";
        }

        $this->tgl_checkout = formatHariTanggal(date('d-m-Y'));
        $this->total_bayar = $post['total_bayar'];
        $this->bukti_transfer =  $this->_uploadImage();
        $this->jurnal =  "Belum";
        $total = $post['total_bayar'] / 2;

        if ($post['dp'] < $total) {
            $this->session->set_flashdata(
                'gagal',
                '<div class="alert alert-danger col-md-12" >
                    <p> Dp haru 50%!!!</p>
                  
                </div>'
            );
            redirect('Customer/Bayar/index/' . $post['id_pemesanan']);
        } else {

            $data = $this->db->insert('konfirmasi_pembayaran', $this);
            if ($data) {

                $this->db->set('status_cus', 'Sudah Checkout');
                $this->db->where('id_pemesanan', $post['id_pemesanan']);
                $this->db->update('pemesanan');

                redirect('Customer/Keranjang');
            }
        }
    }
    private function _uploadImage()
    {
        $config['upload_path']          =  './assets/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['overwrite']            = true;
        $config['max_size']             = 5048; // 1MB
        $config['overwrite']            = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_transfer')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            return $this->upload->data('file_name');
        }
    }
}
