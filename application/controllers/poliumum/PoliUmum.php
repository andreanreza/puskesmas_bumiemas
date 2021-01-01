<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PoliUmum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Poli umum',
            'user'      => $this->Model_auth->userData(),
            'rekmed'    => $this->Model_rekmed->viewPoliUmum()
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/poliumum-index', $data);
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

    public function rm_obat()
    {

        $rm_id = $this->input->post('id');
        $obat = $this->input->post('id_obat');

        foreach ($obat as $o) {
            $data = [
                'id_rm' => $rm_id,
                'id_obat' => $o
            ];
            $this->db->insert('tbl_rm_obat', $data);
        }
        // endforeach;
    }
}
