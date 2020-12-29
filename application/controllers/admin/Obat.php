<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function index()
    {
        $data = [
            'judul'     => 'Data obat',
            'user'      => $this->Model_auth->userData(),
            'obat'      => $this->Model_admin->viewObat()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/obat', $data);
        $this->load->view('templates/footer');
    }

    public function tambahObat()
    {
        $data = [
            'judul'     => 'Tambah Data Obat',
            'user'      => $this->Model_auth->userData(),
        ];

        $this->form_validation->set_rules('kode_obat', 'Kode obat', 'required|trim', [
            'required' => 'Kode obat Harus diisi !'
        ]);
        $this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|trim', [
            'required' => 'Nama obat Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/tambah-obat');
            $this->load->view('templates/footer');
        } else {
            $this->Model_admin->tambahObat();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Berhasil menambahkan data obat baru
             </div>');
            redirect('admin/obat');
        }
    }

    public function editObat($id)
    {
        $data = [
            'judul'             => 'Edit obat Penyakit',
            'user'              => $this->Model_auth->userData(),
            'obatById'          => $this->Model_admin->byIdobat($id)
        ];

        $this->form_validation->set_rules('kode_obat', 'Kode obat', 'required|trim', [
            'required' => 'Kode obat Harus diisi !'
        ]);
        $this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|trim', [
            'required' => 'Nama obat Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/edit-obat', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_admin->editObat();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                 Berhasil mengedit data obat
               </div>');
            redirect('admin/obat');
        }
    }

    // menghapus data diagnosa
    public function hapusObat($id)
    {
        $this->Model_admin->hapusObat($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
             Berhasil menghapus data obat
           </div>');
        redirect('admin/obat');
    }
}
