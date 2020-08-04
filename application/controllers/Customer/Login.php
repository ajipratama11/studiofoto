<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        // if($this->session->userdata('status') != "admin"){
        // 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Owner_controller/A_login')."';
        //     </script>";//Url tujuan
        // }
    }

    public function index()
    {
        $this->load->view('Customer/v_login');
    }

    public function daftar()
    {
        $this->load->view('Customer/v_daftar');
    }
    function logout()
    {
        $this->session->sess_destroy();

        redirect('Customer/Login');
    }
    public function login_cus()
    {
        $post = $this->input->post();
        $u = $this->username = $post['username'];
        $p = $this->password = $post['password'];
        $user = $this->db->get_where('customer', ['username' => $u])->row_array();

        if ($user > 0) {
            $data_session = array(
                'id_cus' => $user['id_cus'],
                'nama_cus' => $user['nama_cus'],
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect('Customer/Beranda/');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Yaaah, username atau password !</div>');
            redirect('Customer/Login/');
        }


        // if ($user) {
        //     // jika usernya aktif
        //     if ($user['is_actived'] == 1) {
        //         // cek password
        //         if ($p == $user['password']) {
        //             $data_session = array(
        //                 'id_cus' => $user['id_cus'],
        //                 'nama_cus' => $user['nama_cus'],
        //                 'status' => "login"
        //             );

        //             $this->session->set_userdata($data_session);
        //             redirect('Customer/Beranda/');
        //         } else {
        //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
        //             redirect('Customer/Login/');
        //         }
        //     } else {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
        //         redirect('Customer/Login/');
        //     }
        // } else {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
        //     redirect('Customer/Login/');
        // }

    }
    public function daftar_cus()
    {
        $post = $this->input->post();
        $this->nama_cus = $post['nama_cus'];
        $this->alamat_cus = $post['alamat_cus'];
        $this->no_hp = $post['no_hp'];
        $this->email_cus = $post['email_cus'];
        $this->username = $post['username'];
        $this->password = $post['password'];
        // $this->is_actived = 0;

        // // siapkan token
        // $token = base64_encode(random_bytes(32));
        // $user_token = [
        //     'email_cus' => $this->email_cus,
        //     'token' => $token,
        //     'date_created' => time()
        // ];
        // $data = $this->db->insert('customer', $this);
        // $this->db->insert('user_token', $user_token);

        // $this->_sendEmail($token, 'verify');
        $data = $this->db->insert('customer', $this);
        if ($data) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success col-md-12" >
                    <p> Yeay, pendaftaran berhasil!!!</p>
                </div>'
            );
        }
        redirect('Customer/Login/index');
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'percetakankusukses@gmail.com',
            'smtp_pass' => 'cetaksukses',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('percetakankusukses@gmail.com', 'Studiofoto');
        $this->email->to($this->input->post('email_cus'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'Customer/Login/verify?email_cus=' . $this->input->post('email_cus') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'Customer/Login/resetpassword?email=' . $this->input->post('email_cus') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email_cus');
        $token = $this->input->get('token');

        $user = $this->db->get_where('customer', ['email_cus' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_actived', 1);
                    $this->db->where('email_cus', $email);
                    $this->db->update('customer');
                    $this->db->delete('user_token', ['email_cus' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('Customer/Login');
                } else {
                    $this->db->delete('user', ['email_cus' => $email]);
                    $this->db->delete('user_token', ['email_cus' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('Customer/Login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('Customer/Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('Customer/Login');
        }
    }
}
