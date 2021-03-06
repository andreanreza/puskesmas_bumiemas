<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Kunjungan pasien',
            'user'      => $this->Model_auth->userData(),
            'kunjungan' => $this->Model_pendaftaran->viewKunjungan()
        ];

        // var_dump($data['kunjungan']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pendaftaran/view-kunjungan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKunjungan()
    {
        $data = [
            'judul'     => 'Tambah Data kunjungan pasien',
            'user'      => $this->Model_auth->userData(),
            'poli'      => $this->db->get('tbl_poli')->result_array(),
            'pasien'    => $this->Model_pendaftaran->viewPasien(),
        ];

        $this->form_validation->set_rules('keluhan', 'keluhan pasien', 'required|trim', [
            'required' => 'keluhan pasien Harus diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pendaftaran/tambah-kunjungan', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Model_pendaftaran->tambahKunjungan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Berhasil menambahkan data kunjungan pasien
             </div>');
            redirect('pendaftaran/kunjungan');
        }
    }

    public function detailKunjungan($id)
    {
        $data = [
            'judul'         => 'detail kunjungan',
            'user'          => $this->Model_auth->userData(),
            'kunjungan'     => $this->Model_pendaftaran->viewKunjungan(),
            'idKunjungan'   => $this->Model_pendaftaran->byIdkunjungan($id)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pendaftaran/detail-kunjungan', $data);
        $this->load->view('templates/footer');
    }

    public function hapusKunjungan($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('tbl_kunjungan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Berhasil menghapus data pasien
      </div>');
        redirect('pendaftaran/kunjungan');
    }

    public function tambahKunjunganrekam($id)
    {

        $data = [
            'judul'         => 'tambah kunjungan rekam',
            'user'          => $this->Model_auth->userData(),
            'kunjungan'     => $this->Model_pendaftaran->viewKunjungan(),
            'idKunjungan'   => $this->Model_pendaftaran->byIdkunjungan($id),
            'poli'          => $this->db->get('tbl_poli')->result()
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pendaftaran/proses-kunjungan-to-rm', $data);
        $this->load->view('templates/footer');
    }

    public function proses()
    {
        $data = [
            'nama'            => $this->input->post('nama'),
            'no_rm'           => $this->input->post('no_rm'),
            'alamat'          => $this->input->post('alamat'),
            'jenis_kelamin'   => $this->input->post('jenis_kelamin'),
            'keluhan'         => $this->input->post('keluhan'),
            'tgl_rekam'       => time(),
            'id_poli'         => $this->input->post('id_poli')
        ];

        $this->db->insert('tbl_rekam', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil mengirim data ke poli tujuan
      </div>');
        redirect('pendaftaran/kunjungan');
    }
}
