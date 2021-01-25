<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        // $this->load->database();
    }
    public function getAll($start = 0, $perpage = 0)
    {
        $this->db->limit($perpage, $start);
        $query = $this->db->get('province');
        return $query->result();
    }

    public function count(Type $var = null)
    {
        $this->db->from('admin');
        return $this->db->count_all_results();
    }

    public function getOne($adminid)
    {
        $this->db->where('admin_id', $adminid);
        $query = $this->db->get('admin');

        return $query->row(0);
    }

    public function checklogin($username, $pwd)
    {
        $hash = sha1($pwd);
        $this->db->where('username', $username);
        $this->db->where('pwd', $hash);
        $this->db->where('is_active', 1);

        $query = $this->db->get('admin');
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row(0);
        }
    }
}
