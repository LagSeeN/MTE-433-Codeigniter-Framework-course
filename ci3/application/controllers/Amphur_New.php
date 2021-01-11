<?php

class Amphur_New extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Province_model');
        $this->load->model('Amphur_model_New');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $province_id = $this->input->get('province_id');

        $data['keyword'] = $keyword;
        $data['province_id'] = $province_id;

        $config['base_url'] = base_url('Amphur_New/Index');
        $config['total_rows'] = $this->Amphur_model_New->count($keyword, $province_id);
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();

        $provinces = $this->Province_model->getAll(0, 100);
        $arr = array('--จังหวัด--');
        foreach ($provinces as $province) {
            $arr[$province->province_id] = $province->province_name;
        }
        $data['provinces'] = $arr;

        $start = $this->uri->segment(3) > 0 ? $this->uri->segment(3) : 0;
        $data['amphurs'] = $this->Amphur_model_New->getAll($start, $config['per_page'], $keyword, $province_id);
        $data["total_rows"] = $config['total_rows'];

        $data['content'] = "amphur_new/show";
        $this->load->view("layout/main", $data);
    }

    public function add()
    {

    }

    public function edit($amphur_id)
    {

    }

    public function delete($amphur_id)
    {

    }

}
