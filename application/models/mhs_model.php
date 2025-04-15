<?php
class mhs_model extends CI_Model {

    public function getByUserId($user_id)
    {
        return $this->db->get_where('mhs', ['user_id' => $user_id])->row();
    }

    public function updateStatusMemilih($nim)
    {
        return $this->db->where('nim', $nim)->update('mhs', ['sudah_memilih' => 1]);
    }

    public function getAll()
    {
        return $this->db->get('mhs')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('mhs', $data);
    }
   
    public function update($nim, $data)
    {
        $this->db->where('nim', $nim);
        $this->db->update('mhs', $data);
    }
}
