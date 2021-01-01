<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PoliKia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Poli Kia',
            'user'      => $this->Model_auth->userData(),

        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/polikia-index', $data);
        $this->load->view('templates/footer');
    }
}
