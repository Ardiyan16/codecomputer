<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_admin extends CI_Model
{
    private $users = 'users';

    public function list_user()
    {
        $this->db->select('*');
        $this->db->from($this->users);
        $this->db->where('is_active', 1);
        $this->db->where('role', 2);
        return $this->db->get()->result();
    }
}