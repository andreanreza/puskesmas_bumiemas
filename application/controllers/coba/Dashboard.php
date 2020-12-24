<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    // tampil dashboard
    public function index()
    {
        $data = [
            'judul'   => 'Dashboard',
            'user'    => $this->Model_auth->userData(),
            'us'      => $this->Model_menu->getUser()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('coba/index', $data);
        $this->load->view('templates/footer');
    }
}
