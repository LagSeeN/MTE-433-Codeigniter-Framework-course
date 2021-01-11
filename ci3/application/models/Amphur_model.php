<?php

class Amphur_model extends CI_Model
{
    public function __construct()
    {
        //$this->load->database();
    }

    public function getAll($keyword = '')
    {
        // $query = $this->db->query("select * from amphur order by amphur_name");

        if (strlen($keyword) > 0) {
            $this->db->like('amphur_name', $keyword, 'both');
        }
        $this->db->order_by('amphur_name', 'ASC');
        // $this->db->where('geo_id','2');
        $this->db->select('*');

        $query = $this->db->get("amphur");

        return $query->result();
    }

    public function getOne($id)
    {
        $this->db->where('amphur_id', $id);
        $query = $this->db->get("amphur");

        return  $query->row(0);
    }

    public function get_province() {
        $province = array();
        $this->db->select('*');
        $query = $this->db->get("province");
    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $province[] = $row;
            }
        }
        return $province;
    }
}
