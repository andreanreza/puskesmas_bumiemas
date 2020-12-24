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
}
