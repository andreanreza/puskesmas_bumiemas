<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pendaftaran extends CI_Model
{
    // pasien
    public function viewPasien()
    {
        $query = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia
                 FROM tbl_pasien ORDER BY id DESC
        ";

        return $this->db->query($query)->result();
    }

    // coba
    public function coba()
    {
        $baris = "SELECT count(if(jk='perempuan', jk, NULL)) as perempuan,
                         count(if(jk='Laki-laki', jk, NULL)) as lakilaki
                         FROM tbl_pasien";

        return $this->db->query($baris)->row_array();
    }

    // jumlah data
    public function countDataPasien()
    {
        $query = " SELECT count('id') as jumlah FROM tbl_pasien";

        return $this->db->query($query)->row_array();
    }

    public function countDataKunjungan()
    {

        $query = "SELECT count('id') as jumlahKunjungan FROM tbl_kunjungan";

        return $this->db->query($query)->row_array();
    }

    // mengambil data terakhir dari field no rm
    public function rm()
    {
        $this->db->select_max('no_rm');
        return $this->db->get('tbl_pasien')->row_array()['no_rm'];
    }

    // manmbah data ke database tbl pasien
    public function tambahPasien()
    {

        $tgl = $this->input->post('tgl_lahir');
        $data = [
            'nama'       => $this->input->post('nama'),
            'no_rm'      => $this->input->post('no_rm'),
            'alamat'     => $this->input->post('alamat'),
            'jk'         => $this->input->post('jk'),
            'tgl_lahir'  => $tgl,
            'tgl_reg'    => time()

        ];

        $this->db->insert('tbl_pasien', $data);
    }

    public function byId($id)
    {
        return $this->db->get_where('tbl_pasien', ['id' => $id])->row();
    }

    // manmbah data ke database tbl pasien
    public function editPasien()
    {
        $data = [
            'nama'       => $this->input->post('nama'),
            'no_rm'      => $this->input->post('no_rm'),
            'alamat'     => $this->input->post('alamat'),
            'jk'         => $this->input->post('jk'),
            'tgl_lahir'  => $this->input->post('tgl_lahir'),
            'tgl_reg'    => time()
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->insert('tbl_pasien', $data);
    }

    // controler kunjungan
    public function viewKunjungan()
    {
        $this->db->select('tbl_kunjungan.*, tbl_pasien.nama, tbl_pasien.no_rm, tbl_pasien.alamat, tbl_pasien.jk');
        $this->db->from('tbl_kunjungan');
        $this->db->join('tbl_pasien', 'tbl_pasien.id = tbl_kunjungan.id_pasien');
        $query = $this->db->get();
        return $query->result();
    }

    // tambah data kunjungan
    public function tambahKunjungan()
    {
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'keluhan'   => $this->input->post('keluhan'),
            'id_poli'   => $this->input->post('id_poli'),
            'tgl_kun'   => time(),
        ];

        $this->db->insert('tbl_kunjungan', $data);
    }

    public function byIdkunjungan($id)
    {

        $this->db->select('tbl_kunjungan.*, tbl_pasien.nama, tbl_pasien.no_rm, tbl_pasien.alamat, tbl_pasien.jk, tbl_poli.poli');
        $this->db->from('tbl_kunjungan');
        $this->db->join('tbl_pasien', 'tbl_pasien.id = tbl_kunjungan.id_pasien');
        $this->db->join('tbl_poli', 'tbl_poli.id = tbl_kunjungan.id_poli');
        $this->db->where('tbl_kunjungan.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
