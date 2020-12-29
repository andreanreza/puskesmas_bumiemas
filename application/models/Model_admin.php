<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    // diagnosa penyakit
    public function viewDiagnosa()
    {

        return $this->db->get('diagnosa')->result();
    }

    public function tambahDiagnosa()
    {
        $data = [
            'kode_diagnosa' => $this->input->post('kode_diagnosa'),
            'nama_diagnosa' => $this->input->post('nama_diagnosa')
        ];

        $this->db->insert('diagnosa', $data);
    }

    public function byIdDiagnosa($id)
    {
        return $this->db->get_where('diagnosa', ['id' => $id])->row();
    }

    public function editDiagnosa()
    {
        $data = [
            'kode_diagnosa' => $this->input->post('kode_diagnosa'),
            'nama_diagnosa' => $this->input->post('nama_diagnosa')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('diagnosa', $data);
    }

    public function hapusDiagnosa($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('diagnosa');
    }

    //Obat
    public function viewObat()
    {
        return  $this->db->get('tbl_obat')->result();
    }


    public function byIdObat($id)
    {
        return $this->db->get_where('tbl_obat', ['id' => $id])->row();
    }

    public function tambahObat()
    {
        $data = [
            'kode_obat' => $this->input->post('kode_obat'),
            'nama_obat' => $this->input->post('nama_obat')
        ];

        $this->db->insert('tbl_obat', $data);
    }

    public function editObat()
    {
        $data = [
            'kode_obat' => $this->input->post('kode_obat'),
            'nama_obat' => $this->input->post('nama_obat')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_obat', $data);
    }

    public function hapusObat($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('tbl_obat');
    }
}
