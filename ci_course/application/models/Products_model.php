<?php

class Products_model extends CI_Model
{
    public function __construct()
    {
        //$this->load->database();
    }

    public function count()
    {
        $this->db->from('products');

        return $this->db->count_all_results();
    }

    public function getAll($start = 0, $perpage = 0, $keyword = '')
    {
        // $query = $this->db->query("select * from province order by province_name");
        $lang = $this->session->userdata('language');
        $this->db->select('*');
        $this->db->order_by('pro_id','RANDOM');
        // if ($lang == 'TH') {
        //     $this->db->order_by('pro_name_th', 'ASC');
        // } else {
        //     $this->db->order_by('pro_name_en', 'ASC');
        // }
        $this->db->limit($perpage, $start);
        $query = $this->db->get("products");
        return $query->result();
    }

    public function getOne($id)
    {
        $this->db->where('pro_id', $id);
        $query = $this->db->get("products");

        return $query->row(0);
    }
}
