<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data = [
            'judul'              => 'Dashboard pendaftaran',
            'user'               => $this->Model_auth->userData(),
            'pasien'             => $this->Model_pendaftaran->viewPasien(),
            'countDataPasien'    => $this->Model_pendaftaran->countDataPasien(),
            'countDataKunjungan' => $this->Model_pendaftaran->countDataKunjungan(),
            'jk'                 => $this->Model_pendaftaran->coba()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pendaftaran/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function viewPasien()
    {
        $data = [
            'judul'     => 'Data pasien',
            'user'      => $this->Model_auth->userData(),
            'pasien'    => $this->Model_pendaftaran->viewPasien()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pendaftaran/view-pendaftaran', $data);
        $this->load->view('templates/footer');
    }

    //menambahkan data diagnosa penyakit
    public function tambahPasien()
    {
        $terakhir_norm = $this->Model_pendaftaran->rm();
        $urutan = (int)substr($terakhir_norm, -4, 4);
        $urutan += 1;
        $kode_rm = 'Rm';
        $no_rm = $kode_rm . sprintf('%04s', $urutan);

        $data = [
            'judul'     => 'Tambah Data Pasien',
            'user'      => $this->Model_auth->userData(),
            'rm'        => $no_rm,
            'jk'        => ['Laki-laki', 'Perempuan']
        ];

        $this->form_validation->set_rules('nama', 'Nama pasien', 'required|trim', [
            'required' => 'Nama pasien Harus diisi !'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pendaftaran/tambah-pasien');
            $this->load->view('templates/footer');
        } else {
            $this->Model_pendaftaran->tambahPasien();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Berhasil menambahkan data pasien baru
             </div>');
            redirect('pendaftaran/pendaftaran/viewpasien');
        }
    }

    public function editPasien($id)
    {
        $data = [
            'judul'     => 'Tambah Data Pasien',
            'user'      => $this->Model_auth->userData(),
            'rmId'      => $this->Model_pendaftaran->byId($id),
            'jk'        => ['Laki-laki', 'Perempuan']
        ];

        $this->form_validation->set_rules('nama', 'Nama pasien', 'required|trim', [
            'required' => 'Nama pasien Harus diisi !'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pendaftaran/edit-pasien');
            $this->load->view('templates/footer');
        } else {
            $this->Model_pendaftaran->editPasien();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Berhasil mengedit data pasien
             </div>');
            redirect('pendaftaran/pendaftaran/viewpasien');
        }
    }

    public function hapusPasien($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_pasien');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
               Berhasil menghapus data pasien 
             </div>');
        redirect('pendaftaran/pendaftaran/viewpasien');
    }
}
