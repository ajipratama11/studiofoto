<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        $this->load->model('M_galeri');
        if ($this->session->userdata('status') != "admin") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Admin/Login') . "';
            </script>"; //Url Logi
        }
    }

    public function index()
    {
        $data['kategori'] = $this->M_galeri->getgaleri();
        $idk = $this->uri->segment(4);
        $data['data'] = $this->M_galeri->getgaleri();
        if ($idk != null) {
            $data['galeri'] = $this->M_galeri->galeri($idk);
            $this->load->view('Admin/v_galeri', $data);
        } else {
            $data['galeri'] = $this->M_galeri->galeri2();
            $this->load->view('Admin/v_galeri', $data);
        }
    }
    public function tambahGaleri()
    {
        $post = $this->input->post();
        $this->foto = $this->_uploadImage();
        $this->id_kategori = $post['id_kategori'];
        $data = $this->db->insert('galeri', $this);
        if($data){
            echo "<script>
                alert('Berhasil Tambah Galeri');
                window.location.href = '".base_url('Admin/Galeri')."';
            </script>";//Url Logi
        }
       
    }

    public function editGaleri()
    {
    }
    public function hapusFoto($id_galeri)
    {
        $this->M_galeri->deleteFoto($id_galeri);
        redirect('Admin/Galeri/index/'.$id_galeri);
    }

    private function _uploadImage()
    {
        $config['upload_path']          =  './assets/studio/img';
        $config['allowed_types']        = 'gif|jpg|png|JPG|jpeg';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['foto']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}	
}
