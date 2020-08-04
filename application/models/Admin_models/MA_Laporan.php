<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MA_Laporan extends CI_Model
{


    function getPemasukkan($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        // $searchNama = $postData['searchNama'];
        $searchBulan = $postData['searchBulan'];
        $searchTahun = $postData['searchTahun'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_cus like '%" . $searchValue . "%'  ) ";
        }
        // if ($searchSuplier != '') {
        //     $search_arr[] = " nama_suplier='" . $searchSuplier . "' ";

        if ($searchTahun != '') {
            $search_arr[] = " tgl_checkout like'%" . $searchTahun . "%' ";
        }        // }

        if ($searchBulan != '') {
            $search_arr[] = " tgl_checkout like'%" . $searchBulan . "%' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->where('status_cus', 'Pesanan Selesai');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.id_pemesanan=pemesanan.id_pemesanan');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.id_pemesanan=pemesanan.id_pemesanan');
        $this->db->where('status_cus', 'Pesanan Selesai');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('pemesanan.id_pemesanan');
        $this->db->limit($rowperpage, $start);

        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.id_pemesanan=pemesanan.id_pemesanan');
        $this->db->where('status_cus', 'Pesanan Selesai');
        $records  = $this->db->get('pemesanan')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_pemesanan" => $record->id_pemesanan,
                "nama_cus" => $record->nama_cus,
                "total_bayar" => number_format($record->total_bayar, 0, ',', '.'),
                "tgl_pemesanan" => $record->tgl_checkout,
                "aksi" => '<button class="btn btn-info" data-toggle="modal" data-target="#modalDetail' . $record->id_pemesanan . '">Detail</button>'
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    function getPengeluaran($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        // $searchNama = $postData['searchNama'];
        $searchBulan = $postData['searchBulan'];
        $searchTahun = $postData['searchTahun'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_pengeluaran like '%" . $searchValue . "%'  ) ";
        }
        // if ($searchSuplier != '') {
        //     $search_arr[] = " nama_suplier='" . $searchSuplier . "' ";

        if ($searchTahun != '') {
            $search_arr[] = " tgl_pengeluaran like'%" . $searchTahun . "%' ";
        }        // }

        if ($searchBulan != '') {
            $search_arr[] = " tgl_pengeluaran like'%" . $searchBulan . "%' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran=tbl_pengeluaran.id_jenis_pengeluaran');
        $records  = $this->db->get('tbl_pengeluaran')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran=tbl_pengeluaran.id_jenis_pengeluaran');
        $records  = $this->db->get('tbl_pengeluaran')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('tbl_pengeluaran.id_pengeluaran');
        $this->db->limit($rowperpage, $start);

        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran=tbl_pengeluaran.id_jenis_pengeluaran');
        $records  = $this->db->get('tbl_pengeluaran')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_pengeluaran" => $record->id_pengeluaran,
                "nama_pengeluaran" => $record->nama_pengeluaran,
                "biaya_pengeluaran" => number_format($record->biaya_pengeluaran, 0, ',', '.'),
                "tgl_pengeluaran" => $record->tgl_pengeluaran,
                "jenis_pengeluaran" => $record->jenis_pengeluaran,
                "aksi" => '<button class="btn btn-info" data-toggle="modal" data-target="#modalDetail' . $record->id_pengeluaran . '">Detail</button>'
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function getJurnal($postData = null)
    {


        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        // $searchNama = $postData['searchNama'];
        // $searchBulan = $postData['searchBulan'];
        $searchTahun = $postData['searchTahun'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = "(  tgl_transaksi like '%" . $searchValue . "%'  ) ";
        }

        if ($searchTahun != '') {
            $search_arr[] = "  tgl_transaksi like '%" . $searchTahun . "%'  ";
        }
        // if ($searchBulan != '') {
        //     $search_arr[] = "  tgl_transaksi like '%" . $searchBulan . "%' ";
        // }

        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->group_by('month(tgl_transaksi)');
        $records  = $this->db->get('transaksi')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->group_by('month(tgl_transaksi)');
        $records  = $this->db->get('transaksi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('id_transaksi');
        $this->db->limit($rowperpage, $start);
        $this->db->group_by('month(tgl_transaksi)');
        $records  = $this->db->get('transaksi')->result();

        $data = array();

        $i = 1;
        foreach ($records as $record) {

            $bulan = date('m', strtotime($record->tgl_transaksi));
            $tahun = date('Y', strtotime($record->tgl_transaksi));

            $data[] = array(
                "no" => $i++,
                "bulan" => bulan($bulan) . ' ' . $tahun,
                "action" => ' <form action="' . base_url("Admin/Laporan/detail_jurnal") . '" method="post">
                <input name="bulan" hidden value="' . $bulan . '">
                <input name="tahun" hidden value="' . $tahun . '">
                <td><button class="btn btn-info" type="submit">Lihat Jurnal</button></td>
            </form>',

            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function getNeraca($postData = null)
    {


        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        // $searchNama = $postData['searchNama'];
        // $searchBulan = $postData['searchBulan'];
        $searchTahun = $postData['searchTahun'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = "(  tgl_transaksi like '%" . $searchValue . "%'  ) ";
        }

        if ($searchTahun != '') {
            $search_arr[] = "  tgl_transaksi like '%" . $searchTahun . "%'  ";
        }
        // if ($searchBulan != '') {
        //     $search_arr[] = "  tgl_transaksi like '%" . $searchBulan . "%' ";
        // }

        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->group_by('month(tgl_transaksi)');
        $records  = $this->db->get('transaksi')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->group_by('month(tgl_transaksi)');
        $records  = $this->db->get('transaksi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('id_transaksi');
        $this->db->limit($rowperpage, $start);
        $this->db->group_by('month(tgl_transaksi)');
        $records  = $this->db->get('transaksi')->result();

        $data = array();

        $i = 1;
        foreach ($records as $record) {

            $bulan = date('m', strtotime($record->tgl_transaksi));
            $tahun = date('Y', strtotime($record->tgl_transaksi));

            $data[] = array(
                "no" => $i++,
                "bulan" => bulan($bulan) . ' ' . $tahun,
                "action" => ' <form action="' . base_url("Admin/Laporan/detail_neraca_saldo") . '" method="post">
                <input name="bulan" hidden value="' . $bulan . '">
                <input name="tahun" hidden value="' . $tahun . '">
                <td><button class="btn btn-info" type="submit">Lihat Neraca Saldo</button></td>
            </form>',

            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function getReff($postData = null)
    {


        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        // $searchNama = $postData['searchNama'];
        // $searchBulan = $postData['searchBulan'];
        $searchReff = $postData['searchReff'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = "(  tgl_transaksi like '%" . $searchValue . "%'  ) ";
        }

        if ($searchReff != '') {
            $search_arr[] = "  transaksi.no_reff like '%" . $searchReff . "%'  ";
        }
        // if ($searchBulan != '') {
        //     $search_arr[] = "  tgl_transaksi like '%" . $searchBulan . "%' ";
        // }

        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('akun', 'transaksi.no_reff=akun.no_reff');
        $records  = $this->db->get('transaksi')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('akun', 'transaksi.no_reff=akun.no_reff');
        $records  = $this->db->get('transaksi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('transaksi.id_transaksi');
        $this->db->join('akun', 'transaksi.no_reff=akun.no_reff');
        $this->db->limit($rowperpage, $start);
        $records  = $this->db->get('transaksi')->result();



        $data = array();

        $i = 1;
        foreach ($records as $record) {
            if ($record->jenis_saldo == '1') {
                $debit = $record->saldo;
                $kredit = '0';
            } else {
                $debit = '0';
                $kredit = $record->saldo;
            }
            $tes = $this->db->query('SELECT SUM(saldo) as total FROM transaksi WHERE no_reff="' . $record->no_reff . '"')->row();

            $data[] = array(
                "tanggal" => formatHariTanggal($record->tgl_transaksi),
                "keterangan" => $record->nama_reff,
                "debit" => 'Rp.' . number_format($debit),
                "kredit" => 'Rp.' . number_format($kredit),
                "total" => '<b style="color:red">Rp.' . number_format($tes->total) . '</b>'
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
}
