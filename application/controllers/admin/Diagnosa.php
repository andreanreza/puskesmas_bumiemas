<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    // tampil data diagnosa penyakit
    public function index()
    {
        $data = [
            'judul'     => 'Diagnosa Penyakit',
            'user'      => $this->Model_auth->userData(),
            'diagnosa'  => $this->Model_admin->viewDiagnosa()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/diagnosa', $data);
        $this->load->view('templates/footer');
    }

    //menambahkan data diagnosa penyakit
    public function tambahDiagnosa()
    {
        $data = [
            'judul'     => 'Tambah Diagnosa Penyakit',
            'user'      => $this->Model_auth->userData(),
        ];

        $this->form_validation->set_rules('kode_diagnosa', 'Kode Diagnosa', 'required|trim', [
            'required' => 'Kode Diagnosa Harus diisi !'
        ]);
        $this->form_validation->set_rules('nama_diagnosa', 'Nama Diagnosa', 'required|trim', [
            'required' => 'Nama Diagnosa Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/tambah-diagnosa');
            $this->load->view('templates/footer');
        } else {
            $this->Model_admin->tambahDiagnosa();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Berhasil menambahkan data diagnosa baru
         </div>');
            redirect('admin/diagnosa');
        }
    }

    //menambahkan data diagnosa penyakit
    public function editDiagnosa($id)
    {
        $data = [
            'judul'             => 'Edit Diagnosa Penyakit',
            'user'              => $this->Model_auth->userData(),
            'diagnosaById'      => $this->Model_admin->byIdDiagnosa($id)
        ];

        $this->form_validation->set_rules('kode_diagnosa', 'Kode Diagnosa', 'required|trim', [
            'required' => 'Kode Diagnosa Harus diisi !'
        ]);
        $this->form_validation->set_rules('nama_diagnosa', 'Nama Diagnosa', 'required|trim', [
            'required' => 'Nama Diagnosa Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/edit-diagnosa', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_admin->editDiagnosa();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                 Berhasil mengedit data diagnosa
               </div>');
            redirect('admin/diagnosa');
        }
    }

    // menghapus data diagnosa
    public function hapusDiagnosa($id)
    {
        $this->Model_admin->hapusDiagnosa($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
             Berhasil menghapus data diagnosa
           </div>');
        redirect('admin/diagnosa');
    }
}
