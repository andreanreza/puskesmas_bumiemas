<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
            'judul'                  => 'Dashboard',
            'user'                   => $this->Model_auth->userData(),
            'us'                     => $this->Model_menu->getUser(),
            'countDataPasien'        => $this->Model_pendaftaran->countDataPasien(),
            'countDataKunjungan'     => $this->Model_pendaftaran->countDataKunjungan(),
            'umumterperiksa'         => $this->Model_rekmed->poliUmumTerperiksa(),
            'umumbelumperiksa'       => $this->Model_rekmed->poliUmumBelumPeriksa(),
            'terperiksa'             => $this->Model_rekmed->poliKiaTerperiksa(),
            'belumperiksa'           => $this->Model_rekmed->poliKiaBelumPeriksa()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    // tampil menu user
    public function user()
    {
        $data = [
            'judul'   => 'Halaman User',
            'user'    => $this->Model_auth->userData(),
            'getuser' => $this->Model_menu->getUser()

        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    // hapus user
    public function hapusUser($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Berhasil menghapus User
      </div>');
        redirect('admin/user');
    }
}
