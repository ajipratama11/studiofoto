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
    public function jurnalList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getJurnal($postData);

        echo json_encode($data);
    }
    public function neracaList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getNeraca($postData);

        echo json_encode($data);
    }
    public function reffList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getReff($postData);

        echo json_encode($data);
    }
    public function labaList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getLaba($postData);

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
    public function jurnal()
    {

        $this->db->group_by('year(tgl_transaksi)');
        $data['jurnal'] = $this->db->get('transaksi')->result();
        $cek = $this->db->get('transaksi')->row();
        if (!$cek) {
            echo "<script>
            alert('Jurnal masih kosong, buat dulu ya!!');
            window.location.href = '" . base_url('Admin/Laporan/tambah_jurnal') . "';
        </script>"; //Url tujuan
        } else {
            $this->load->view('Admin/v_jurnal_umum', $data);
        }
    }
    public function tambah_jurnal()
    {

        $this->load->view('Admin/v_tambah_jurnal');
    }
    public function buku_besar()
    {

        $this->load->view('Admin/v_buku_besar');
    }

    public function tambahJurnal()
    {
        $post = $this->input->post();
        $this->tgl_transaksi = $post['tgl_transaksi'];
        $this->no_reff = $post['no_reff'];
        $this->saldo = $post['saldo'];
        $this->jenis_saldo = $post['jenis_saldo'];
        $this->tgl_input = date('d-m-Y') . ' ' . date("h:i:s");
        $data = $this->db->insert('transaksi', $this);
        if ($data) {
            // $this->db->set('jurnal', 'Ya');
            // $this->db->update('konfirmasi_pemesanan');
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-info" >
                    <p> Jurnal ditambahkan!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }

    public function tambahJurnal2()
    {
        $post = $this->input->post();
        $this->tgl_transaksi = $post['tgl_transaksi'];
        $this->no_reff = $post['no_reff'];
        $this->saldo = $post['saldo'];
        $this->jenis_saldo = $post['jenis_saldo'];
        $this->tgl_input = date('d-m-Y') . ' ' . date("h:i:s");
        $data = $this->db->insert('transaksi', $this);
        if ($data) {

            $this->db->query('UPDATE  konfirmasi_pembayaran SET jurnal="Ya" WHERE jurnal="Belum"');
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-info" >
                    <p> Jurnal ditambahkan!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }
    public function detail_jurnal()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['jurnal'] = $this->db->get('transaksi')->result();

        $this->db->select('SUM(saldo) as total');

        $this->db->where('jenis_saldo', 1);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['debit'] = $this->db->get('transaksi')->row();

        $this->db->select('SUM(saldo) as total');
        $this->db->where('jenis_saldo', 2);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['kredit'] = $this->db->get('transaksi')->row();

        $this->load->view('Admin/v_jurnal_detail', $data);
    }
    public function detail_laba()
    {
        $bulan = $this->input->post('bulan');
        $data['bulan'] = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');


        $this->db->select('sum(saldo) as total,transaksi.*,akun.*');
        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->group_by('transaksi.no_reff');
        $this->db->where('transaksi.no_reff !=', 'r5');
        $this->db->where('transaksi.no_reff !=', 'r4');
        $this->db->where('transaksi.no_reff !=', 'r7');
        $this->db->where('transaksi.jenis_saldo', '1');
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['jurnal'] = $this->db->get('transaksi')->result();


        $this->db->select('sum(saldo) as total,transaksi.*,akun.*');
        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->group_by('transaksi.no_reff');
        $this->db->where('transaksi.no_reff !=', 'r5');
        $this->db->where('transaksi.no_reff !=', 'r4');
        $this->db->where('transaksi.no_reff !=', 'r7');
        $this->db->where('transaksi.jenis_saldo', '2');
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['biaya'] = $this->db->get('transaksi')->result();


        $this->db->select('sum(saldo) as total,transaksi.*,akun.*');
        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->group_by('transaksi.jenis_saldo');
        $this->db->where('transaksi.no_reff !=', 'r5');
        $this->db->where('transaksi.no_reff !=', 'r4');
        $this->db->where('transaksi.no_reff !=', 'r7');
        $this->db->where('transaksi.jenis_saldo', '1');
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['total1'] = $this->db->get('transaksi')->row();

        $this->db->select('sum(saldo) as total,transaksi.*,akun.*');
        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->group_by('transaksi.jenis_saldo');
        $this->db->where('transaksi.no_reff !=', 'r5');
        $this->db->where('transaksi.no_reff !=', 'r4');
        $this->db->where('transaksi.no_reff !=', 'r7');
        $this->db->where('transaksi.jenis_saldo', '2');
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['total2'] = $this->db->get('transaksi')->row();



        // $this->db->select('SUM(saldo) as total');
        // $this->db->where('jenis_saldo', 1);
        // $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        // $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        // $data['debit'] = $this->db->get('transaksi')->row();

        // $this->db->select('SUM(saldo) as total');
        // $this->db->where('jenis_saldo', 2);
        // $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        // $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        // $data['kredit'] = $this->db->get('transaksi')->row();

        $this->load->view('Admin/v_lap_labarugi', $data);
    }
    function getJenis()
    {
        $id_jenis = $this->input->post('id', TRUE);
        $this->db->where('id_jenis', $id_jenis);
        $data = $this->db->get('akun')->result();
        echo json_encode($data);
    }

    public function neraca_saldo()
    {

        $this->db->group_by('year(tgl_transaksi)');
        $data['jurnal'] = $this->db->get('transaksi')->result();
        $cek = $this->db->get('transaksi')->row();
        if (!$cek) {
            echo "<script>
            alert('Neraca saldo masih kosong, buat jurnal dulu ya!!');
            window.location.href = '" . base_url('Admin/Laporan/tambah_jurnal') . "';
        </script>"; //Url tujuan
        } else {
            $this->load->view('Admin/v_neraca_saldo', $data);
        }
    }
    // public function semua_neraca()
    // {
    //     $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
    //     $data['jurnal'] = $this->db->get('transaksi')->result();
    //     $cek = $this->db->get('transaksi')->row();
    //     if (!$cek) {
    //         echo "<script>
    //         alert('Neraca saldo masih kosong, buat jurnal dulu ya!!');
    //         window.location.href = '" . base_url('Admin/Laporan/tambah_jurnal') . "';
    //     </script>"; //Url tujuan
    //     } else {
    //         $this->load->view('Admin/v_semua_neraca', $data);
    //     }
    // }
    public function detail_neraca_saldo()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');


        $this->db->select('sum(saldo) as total,transaksi.*,akun.*');
        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->group_by('transaksi.no_reff');
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['jurnal'] = $this->db->get('transaksi')->result();

        $this->db->select('SUM(saldo) as total');
        $this->db->where('jenis_saldo', 1);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['debit'] = $this->db->get('transaksi')->row();

        $this->db->select('SUM(saldo) as total');
        $this->db->where('jenis_saldo', 2);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['kredit'] = $this->db->get('transaksi')->row();


        $this->load->view('Admin/v_neraca_detail', $data);
    }

    public function ubahJurnal()
    {
        $post = $this->input->post();
        $this->tgl_transaksi = $post['tgl_transaksi'];
        $this->id_transaksi = $post['id_transaksi'];
        $this->jenis_saldo = $post['jenis_saldo'];
        $this->no_reff = $post['no_reff'];
        $this->saldo = $post['saldo'];
        $this->tgl_input = date('d-m-Y') . ' ' . date("h:i:s");
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $data = $this->db->update('transaksi', $this);
        if ($data) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-info" >
                    <p> Jurnal dirubah!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }
    public function hapusJurnal()
    {
        $post = $this->input->post();
        $this->id_transaksi = $post['id_transaksi'];
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $data = $this->db->delete('transaksi', $this);
        if ($data) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-danger" >
                    <p> Jurnal dihapus!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }

    public function laba_rugi()
    {
        $this->db->group_by('year(tgl_transaksi)');
        $data['jurnal'] = $this->db->get('transaksi')->result();
        $cek = $this->db->get('transaksi')->row();
        if (!$cek) {
            echo "<script>
            alert('Jurnal masih kosong, buat dulu ya!!');
            window.location.href = '" . base_url('Admin/Laporan/tambah_jurnal') . "';
        </script>"; //Url tujuan
        } else {
            $this->load->view('Admin/v_laba_rugi', $data);
        }
    }
}
