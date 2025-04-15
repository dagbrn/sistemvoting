<?php
class user_model extends CI_Model {

    public function getByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function findByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }
    
}
