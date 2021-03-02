<?php

class Products_model extends CI_Model {
   
    public function count()
    {        
        $this->db->from('products');
        return $this->db->count_all_results();
    }

    public function getAll($start=0 , $perpage=0, $keyword='')
    {
    	$lang = $this->session->userdata('language');
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('pro_id','RANDOM');
        // if($lang=='TH'){
        //     $this->db->order_by('pro_name_th', 'ASC');
        // }
        // else{
        //      $this->db->order_by('pro_name_en', 'ASC');
        // }
        $this->db->limit($perpage,$start);
		$query = $this->db->get();
		return $query->result();
    }

    public function getOne($id)
    {
        $this->db->where('pro_id',$id);
        $query = $this->db->get('products');
        return $query->row(0);
    }


}