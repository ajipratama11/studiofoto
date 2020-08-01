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


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_cus like '%" . $searchValue . "%'  ) ";
        }
        // if ($searchSuplier != '') {
        //     $search_arr[] = " nama_suplier='" . $searchSuplier . "' ";
        // }

        if ($searchBulan != '') {
            $search_arr[] = " tgl_checkout like'%" . $searchBulan . "%' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.id_pemesanan=pemesanan.id_pemesanan');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.id_pemesanan=pemesanan.id_pemesanan');
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
        $records  = $this->db->get('pemesanan')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_pemesanan" => $record->id_pemesanan,
                "nama_cus" => $record->nama_cus,
                "total_bayar" => $record->total_bayar,
                "tgl_pemesanan" => $record->tgl_pemesanan,
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
