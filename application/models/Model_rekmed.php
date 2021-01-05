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
        $this->db->where('tbl_rekam.status', 0);
        $this->db->order_by('tgl_rekam', 'desc');

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

    public function viewRmObat()
    {

        return $this->db->get('tbl_rm_obat')->result();
    }


    //poli kia
    public function viewPolikia()
    {

        $this->db->select('tbl_rekam.*, tbl_poli.poli');
        $this->db->from('tbl_rekam');
        $this->db->join('tbl_poli', 'tbl_poli.id = tbl_rekam.id_poli');
        $this->db->where('tbl_rekam.id_poli', 2);
        $this->db->where('tbl_rekam.status', 0);
        $this->db->order_by('tgl_rekam', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function rmObatById($id)
    {
        $this->db->select('tbl_rm_obat.*, tbl_rekam.*, tbl_obat.nama_obat');
        $this->db->from('tbl_rm_obat');
        $this->db->join('tbl_rekam', 'tbl_rm_obat.id_rm = tbl_rekam.id');
        $this->db->join('tbl_obat', 'tbl_rm_obat.id_obat = tbl_obat.id');
        $this->db->where('tbl_rekam.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function viewPolikiaTerperiksa()
    {

        $this->db->select('tbl_rekam.*, tbl_poli.poli');
        $this->db->from('tbl_rekam');
        $this->db->join('tbl_poli', 'tbl_poli.id = tbl_rekam.id_poli');
        $this->db->where('tbl_rekam.id_poli', 2);
        $this->db->where('tbl_rekam.status', 1);
        $this->db->order_by('tgl_rekam', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function viewPoliUmumTerperiksa()
    {

        $this->db->select('tbl_rekam.*, tbl_poli.poli');
        $this->db->from('tbl_rekam');
        $this->db->join('tbl_poli', 'tbl_poli.id = tbl_rekam.id_poli');
        $this->db->where('tbl_rekam.id_poli', 1);
        $this->db->where('tbl_rekam.status', 1);
        $this->db->order_by('tgl_rekam', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    //conut poli umum
    public function poliUmumTerperiksa()
    {
        $query = "SELECT COUNT('id') as jumlah FROM tbl_rekam WHERE id_poli = 1 AND status = 1";
        return $this->db->query($query)->row_array();
    }

    public function poliUmumBelumPeriksa()
    {
        $query = "SELECT COUNT('id') as jumlah FROM tbl_rekam WHERE id_poli = 1 AND status = 0";
        return $this->db->query($query)->row_array();
    }
    //end count poli umum

    //count poli kia
    public function poliKiaTerperiksa()
    {
        $query = "SELECT COUNT('id') as jumlah FROM tbl_rekam WHERE id_poli = 2 AND status = 1";
        return $this->db->query($query)->row_array();
    }

    public function poliKiaBelumPeriksa()
    {
        $query = "SELECT COUNT('id') as jumlah FROM tbl_rekam WHERE id_poli = 2 AND status = 0";
        return $this->db->query($query)->row_array();
    }
    //end count poli kia
}
