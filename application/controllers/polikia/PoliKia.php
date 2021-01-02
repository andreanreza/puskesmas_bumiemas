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
            'judul'     => 'Poli kia',
            'user'      => $this->Model_auth->userData(),
            'rekmed'    => $this->Model_rekmed->viewPolikia(),
            'rmobat'    => $this->db->get('tbl_rm_obat')->result()
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/polikia-index', $data);
        $this->load->view('templates/footer');
    }

    public function editrekmed($id)
    {

        $data = [
            'judul'       => 'Periksa',
            'user'        => $this->Model_auth->userData(),
            'rekmedId'    => $this->Model_rekmed->rekmedById($id),
            'jk'          => ['Laki-laki', 'Perempuan'],
            'obat'        => $this->db->get('tbl_obat')->result()

        ];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/periksa', $data);
        $this->load->view('templates/footer');
    }

    public function rmObat()
    {
        $idRm = $this->input->post('id');
        $idObat = $this->input->post('id_obat');

        foreach ($idObat as $ob) {

            $data = [
                'id_rm' => $idRm,
                'id_obat' => $ob
            ];
            $this->db->insert('tbl_rm_obat', $data);
        }

        $this->db->set('tgl_rekam', time());
        $this->db->where('id', $idRm);
        $this->db->update('tbl_rekam');
        redirect('polikia/polikia');
    }

    public function hapusrekmed($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_rekam');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil menghapus data 
      </div>');
        redirect('polikia/polikia');
    }
}
