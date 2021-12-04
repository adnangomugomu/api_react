<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
        $this->load->helper('fungsi_helper');
    }

    public function auth()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $user = $this->db->get('user')->row();

        if ($user) {
            json([
                'status' => 'success',
                'msg' => 'Login Berhasil',
                'data' => $user,
            ]);
        } else {
            json([
                'status' => 'failed',
                'msg' => 'Username dan password tidak sesuai',
            ]);
        }
    }
}

/* End of file Login.php */
