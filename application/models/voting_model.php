<?php
class voting_model extends CI_Model {

    public function insert($data)
    {
        $data['waktu_voting'] = date('Y-m-d H:i:s');
        return $this->db->insert('voting', $data);
    }

    public function getByMhsId($mhs_id)
    {
        return $this->db->get_where('voting', ['mhs_id' => $mhs_id])->row();
    }
}
