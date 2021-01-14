<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    //  Tampil data profile user yang login
    public function index()
    {
        $data = [
            'judul'         => 'Profile',
            'user'          => $this->Model_auth->userData(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function gantiPassword()
    {
        $data = [
            'judul'         => 'Ganti Password',
            'user'          => $this->Model_auth->userData(),
        ];

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password baru', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('profile/ganti-password', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password lama anda salah
              </div>');
                redirect('profile/gantiPassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password baru sama dengan password lama
                  </div>');
                    redirect('profile/profile/gantiPassword');
                } else {
                    // password lolos
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Password berhasil diganti
                  </div>');
                    redirect('profile/profile/gantiPassword');
                }
            }
        }
    }
}
