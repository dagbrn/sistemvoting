<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kandidat_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllWithSuara()
    {
        $this->db->select('kandidat.*, mhs.nama, COUNT(voting.id) as total_suara');
        $this->db->from('kandidat');
        $this->db->join('mhs', 'mhs.nim = kandidat.mhs_id');
        $this->db->join('voting', 'voting.kandidat_id = kandidat.id', 'left');
        $this->db->group_by('kandidat.id');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('kandidat.*, mhs.nama');
        $this->db->from('kandidat');
        $this->db->join('mhs', 'kandidat.mhs_id = mhs.nim');
        $this->db->where('kandidat.id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    public function insert($data)
    {
        $this->db->insert('kandidat', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('kandidat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kandidat');
    }
}
