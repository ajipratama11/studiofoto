<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pemesan extends CI_Model
{


    function getJadwal($postData = null)
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
        $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (tgl_pemesanan like '%" . $searchValue . "%'  ) ";
        }
        // if ($searchSuplier != '') {
        //     $search_arr[] = " nama_suplier='" . $searchSuplier . "' ";
        // }
        if ($searchBulan != '') {
            $search_arr[] = " tgl_pemesanan like '%" . $searchBulan . "' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');

        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);

        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('pemesanan.id_cus');
        $this->db->limit($rowperpage, $start);

        $this->db->join('customer', 'customer.id_cus=pemesanan.id_cus');
        $records  = $this->db->get('pemesanan')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_cus" => $record->id_cus,
                "nama_cus" => $record->nama_cus,
                "tgl_pemesanan" => $record->tgl_pemesanan,
                "tgl_pemesanan" => $record->tgl_pemesanan,
                "waktu_pemesanan" => $record->waktu_pemesanan,
                "waktu_selesai" => $record->waktu_selesai

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
