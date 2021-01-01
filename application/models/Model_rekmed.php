<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_rekmed extends CI_Model
{
    public function viewPoliUmum()
    {
        // return $this->db->get_where('tbl_rekam', ['id_poli' => 1])->result();

        $this->db->select('tbl_rekam.*, tbl_poli.poli');
        $this->db->from('tbl_rekam');
        $this->db->join('tbl_poli', 'tbl_poli.id = tbl_rekam.id_poli');
        $this->db->where('tbl_rekam.id_poli', 1);

        $query = $this->db->get();
        return $query->result();
    }

    public function rekmedById($id)
    {
        $this->db->select('tbl_rekam.*, tbl_poli.poli');
        $this->db->from('tbl_rekam');
        $this->db->join('tbl_poli', 'tbl_poli.id = tbl_rekam.id_poli');
        $this->db->where('tbl_rekam.id', $id);

        $query = $this->db->get();
        return $query->row();
    }
}
