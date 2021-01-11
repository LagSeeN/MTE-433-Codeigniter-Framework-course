<?php

class Amphur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Amphur_model");
    }

    public function index()
    {

        $keyword = $this->input->get('keyword');
        $data['keyword'] = $keyword;
        $data["amphurs"] = $this->Amphur_model->getAll($keyword);

        // echo $this->db->last_query();
        // exit();

        $this->load->view("amphur/show", $data);

    }

    public function addForm()
    {
        $data['method'] = '';
        $data['amphur'] = '';
        $data['amphur_id'] = '';
        $data['province'] = $this->Amphur_model->get_province();
        $this->load->view('amphur/form', $data);
    }

    public function addSave()
    {
        $amphur_code = $this->input->post('amphur_code');
        $amphur_name = $this->input->post('amphur_name');
        $province_id = $this->input->post('selectProvince'); 

        $arr = array();
        $arr['amphur_code'] = $amphur_code;
        $arr['amphur_name'] = $amphur_name;
        $arr['province_id'] = $province_id;

        $this->db->insert('amphur', $arr);

        redirect("Amphur/index");
    }

    public function editForm($amphur_id)
    {
        $data['method'] = 'edit';
        $data['amphur'] = $this->Amphur_model->getOne($amphur_id);
        $data['amphur_id'] = $amphur_id;
        $data['province'] = $this->Amphur_model->get_province();
        $this->load->view('amphur/form', $data);
    }

    public function editSave($amphur_id)
    {
        $amphur_code = $this->input->post('amphur_code');
        $amphur_name = $this->input->post('amphur_name');
        $province_id = $this->input->post('selectProvince'); 

        $arr = array();
        $arr['amphur_code'] = $amphur_code;
        $arr['amphur_name'] = $amphur_name;
        $arr['province_id'] = $province_id;

        $this->db->where('amphur_id',$amphur_id);
        $this->db->update('amphur', $arr);

        redirect("Amphur/index");
    }

    public function delete($amphur_id)
    {
        $this->db->where('amphur_id',$amphur_id);
        $this->db->delete('amphur');

        redirect("Amphur/index");
    }
}
