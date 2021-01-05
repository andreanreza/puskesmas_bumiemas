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
            'rekmed'    => $this->Model_rekmed->viewPoliUmum(),
            'rmobat'    => $this->db->get('tbl_rm_obat')->result(),

        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/poliumum-index', $data);
        $this->load->view('templates/footer');
    }

    public function dashboard()
    {

        $data = [
            'judul'        => 'dashborad',
            'user'         => $this->Model_auth->userData(),
            'terperiksa'   => $this->Model_rekmed->poliUmumTerperiksa(),
            'belumperiksa' => $this->Model_rekmed->poliUmumBelumPeriksa()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/dashboard-poliumum', $data);
        $this->load->view('templates/footer');
    }

    public function Terperiksa()
    {
        $data = [
            'judul'     => 'Poli kia',
            'user'      => $this->Model_auth->userData(),
            'rekmed'    => $this->Model_rekmed->viewPoliUmumTerperiksa(),
            'rmobat'    => $this->db->get('tbl_rm_obat')->result()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('poli/poliumum-sudahperiksa', $data);
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
        $this->load->view('poli/periksa-poli-umum', $data);
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

        // $data1 = [
        //     'tgl_rekam' => time()
        // ];
        $this->db->set('status', 1);
        $this->db->set('tgl_rekam', time());
        $this->db->where('id', $idRm);
        $this->db->update('tbl_rekam');
        redirect('poliumum/poliumum/terperiksa');
    }

    public function hapusrekmed($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_rekam');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil menghapus data 
      </div>');
        redirect('poliumum/poliumum');
    }

    public function cetakpdf($id)
    {
        $this->load->library('dompdf_gen');

        $data['rekmed'] = $this->Model_rekmed->rmObatById($id);

        $this->load->view('poli/cetak-laporan-id', $data);

        $paper = 'A4';
        $orientasi = 'lanscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper, $orientasi);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_rekam_medis.pdf", [
            'attachment' => 0
        ]);
    }
}
